<?php

namespace App\Http\Controllers;

use App\Models\Log_Surat;
use App\Models\Surat;
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mail;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth('admin')->user() !== null){

            
        
        $userActive = auth('admin')->user()->roles->toArray();

        if($userActive[0]['name'] == 'super'){        

            $dataSurat = Surat::all();

        } else if($userActive[0]['name'] == 'reviewer'){

            $dataSurat = Surat::where('status', '=', 'belum direview')->get();

        } else {

             $dataSurat = Surat::where('tujuan_surat', '=', auth('admin')->user()->id)->where('status', '=', 'lolos')->get();

        }

        return view('multiauth::actions.indexSurat', ['dataSurat' => $dataSurat, '$userActive' => $userActive]);
        } else {
            return view('welcome');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Admin::all();
        return view('multiauth::actions.addSurat', ['dataRole' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
        
        $image = $request->file('File');
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();
        $destinationPath = public_path('/file');
        $image->move($destinationPath, $name);


        $surat = new Surat;
        $surat->nama_surat = $request->nama_surat;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->asal_surat = $request->asal_surat;
        $surat->sifat = $request->sifat_surat;
        $surat->perihal = $request->perihal;
        $surat->tujuan_surat = $request->tujuan_surat;
        $surat->tgl_surat = $request->tgl_surat;
        $surat->status = 'belum direview';
        $surat->file = $name;
        $surat->save();

        $lastInserted = DB::getPdo()->lastInsertId();
        $userActive = auth('admin')->user()->id;
        
        $log = new Log_Surat;
        $log->id_surat = $lastInserted;
        $log->id_user = $userActive;
        $log->status = 'baru';
        $log->keterangan = 'surat masuk baru, belum di review';
        $log->save();

        DB::commit();        
        } catch (Exception $e) {
            DB::rollback();
            return back()->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ])->withInput();
        }

        return redirect()
            ->route('surat.index')
            ->with([
                'message'    => 'data berhasil tersimpan',
                'alert-type' => 'success',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        //
    }

    public function addreview(request $request, $id)
    {
        return view('multiauth::actions.review', ['id' => $id]);
    }

    public function saveReview(request $request, $id)
    {
        DB::beginTransaction();
        try{

        $status = "";

        if($request->status == 'yes'){
            $status = 'lolos';
        } else {
            $status = 'ditolak';
        }
        $surat = Surat::findOrFail($id);

        $surat->status = $status;        
        $surat->save();

        $userActive = auth('admin')->user()->id;    
        $email = auth('admin')->user()->email;

        $log = new Log_Surat;
        $log->id_surat = $id;
        $log->id_user = $userActive;
        $log->status = $request->status;
        $log->keterangan = $request->keterangan;
        $log->save();

        DB::commit();    

        Mail::send(['text'=>'mail'], [$surat, $email], function ($m) use ($surat, $email) {
            $m->from($email, 'Surat Masuk');

            $m->to($surat->user->email, $surat->user->name)->subject('Surat Baru Masuk');
        });

        } catch (Exception $e) {
            DB::rollback();
            return back()->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ])->withInput();
        }

         return redirect()
            ->route('surat.index')
            ->with([
                'message'    => 'data berhasil tersimpan',
                'alert-type' => 'success',
            ]);
    }

    public function addDisposisi(request $request, $id)
    {   
        $user = Admin::all();
        return view('multiauth::actions.disposisi', ['id' => $id, 'dataUser' => $user]);
    }

    public function saveDisposisi(request $request, $id)
    {
        DB::beginTransaction();
        try{

        $surat = Surat::findOrFail($id);

        $surat->tujuan_surat = $request->tujuan_surat;        
        $surat->save();

        $userActive = auth('admin')->user()->id;    
        $email = auth('admin')->user()->email;

        $log = new Log_Surat;
        $log->id_surat = $id;
        $log->id_user = $userActive;
        $log->status = 'Disposisi';
        $log->keterangan = $request->keterangan;
        $log->save();

        DB::commit();    

        Mail::send(['html'=>'mail'], [$surat, $email], function ($m) use ($surat, $email) {
            $m->from($email, 'Surat Masuk');

            $m->to($surat->user->email, $surat->user->name)->subject('Surat Baru Masuk');
        });

        } catch (Exception $e) {
            DB::rollback();
            return back()->with([
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ])->withInput();
        }

         return redirect()
            ->route('surat.index')
            ->with([
                'message'    => 'data berhasil tersimpan',
                'alert-type' => 'success',
            ]);
    }
}