@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</h4>
                    </header><!-- .widget-header -->                    
                    <hr class="widget-separator">
                    <div class="widget-body">
                        @admin('super')
                            <a href="{{ route('surat.create') }}" class="btn btn-success">Tambah Surat</a>
                        @endadmin
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Perihal</th>
                                        <th>Tujuan Surat</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Action</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataSurat as $surat)
                                    <tr>
                                        <td>{{ $surat->nama_surat }}</td>
                                        <td>{{ $surat->nomor_surat }}</td>
                                        <td>{{ $surat->asal_surat }}</td>
                                        <td>{{ $surat->perihal }}</td>
                                        <td>{{ $surat->user->name }}</td>
                                        <td><a href="{{ asset('file/') }}">{{ $surat->file }}</a> </td>
                                        <td>
                                        @php
                                            if($surat->sifat == 'Biasa'){
                                                echo '<button class="btn btn-success btn-xs">'.$surat->sifat.'</button>';
                                            } else if($surat->sifat == 'Edaran'){
                                                echo '<button class="btn btn-primary btn-xs">'.$surat->sifat.'</button>';
                                            } else if($surat->sifat == 'Pengumuman'){
                                                echo '<button class="btn btn-warning btn-xs">'.$surat->sifat.'</button>';
                                            } else {
                                                echo '<button class="btn btn-danger btn-xs">'.$surat->sifat.'</button>';
                                            }
                                            echo ' ';
                                            if($surat->status == 'belum direview'){
                                                echo '<button class="btn btn-warning btn-xs">Baru</button>';
                                            } else if($surat->sifat == 'lolos review'){
                                                echo '<button class="btn btn-success btn-xs">Disposisi</button>';
                                            } 
                                        @endphp
                                            
                                        </td>

                                        <td>
                                            @admin('super')
                                            <a type="button" class="btn btn-danger btn-s">Delete</a>
                                            @endadmin

                                            @admin('reviewer')
                                            <a type="button" class="btn btn-warning btn-s">Review</a>
                                            @endadmin
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection