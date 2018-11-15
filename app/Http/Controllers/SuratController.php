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

        return view('multiauth::actions.indexSurat');

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
        $log->status = 'surat masuk';
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
}
