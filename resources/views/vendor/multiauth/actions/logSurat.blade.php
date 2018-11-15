@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Log History</h4>
                    </header><!-- .widget-header -->
                    <hr class="widget-separator">
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Surat</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Waktu</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataLog as $log)
                                    <tr>
                                        <td>{{ $log->Surat->nama_surat }}</td>
                                        <td>{{ $log->Admin->name }}</td>
                                        <td>{{ $log->status }}</td>
                                        <td>{{ $log->keterangan }}</td> 
                                        <td>{{ $log->created_at }}</td>                                    
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