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
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>Action</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-s">Edit</a>  <a type="button" class="btn btn-danger btn-s">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection