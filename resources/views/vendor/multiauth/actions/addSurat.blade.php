@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
            <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Tambah Data Siswa</h4>
                    </header><!-- .widget-header -->
                    <hr class="widget-separator">
                    <div class="widget-body">
                        <form action="{{ route('surat.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Nama Surat</label>
                                <div class="col-sm-5">
                                    <input class="form-control" name="nama_surat" type="text" required placeholder="Nama Surat">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Nomor Surat</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="nomor_surat" required placeholder="Nomor Surat">
                                </div>
                            </div><!-- .form-group -->                          

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Asal Surat</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="asal_surat" required placeholder="Asal Surat">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Sifat</label>
                                <div class="col-sm-5">
                                    <select name="sifat_surat" class="form-control" required>
                                        <option value="Biasa">Surat Biasa</option>
                                        <option value="Edaran">Surat Edaran</option>
                                        <option value="Pengumuman">Surat Pengumuman</option>
                                        <option value="Mendesak">Surat Mendesak</option>
                                    </select>
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Perihal</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="perihal" required placeholder="Perihal">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Tanggal Surat</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="date" name="tgl_surat" required>
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Tujuan Surat</label>
                                <div class="col-sm-5">
                                    <select name="tujuan_surat" class="form-control" required>
                                        @foreach($dataRole as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">    
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label">Lampiran Surat</label>
                                <div class="col-sm-5">                                    
                                    <input type="file" name="File" id="fileExcel" class="form-control">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label for="#" class="col-sm-2 col-sm-offset-2 control-label"></label>                          
                                <div class="col-sm-2">
                                    <input type="submit" class="form-control btn btn-primary" name="save" value="Save">
                                </div>
                                <div class="col-sm-2">
                                    <a href="" class="form-control btn btn-warning">Back</a>
                                </div>                              
                            </div>
                            
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection