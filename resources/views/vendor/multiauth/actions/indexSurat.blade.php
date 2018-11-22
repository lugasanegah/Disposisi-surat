@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        @include('multiauth::message')
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
                            <table id="users-table" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th width="20%">Nama Surat</th>
                                        <th width="15%">Perihal</th>
                                        <th width="15%">Tujuan Surat</th>
                                        <th>Status</th>
                                        <th>Action</th>                                     
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{  route('admin.dataSurat') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_surat', name: 'nama_surat' },
            { data: 'perihal', name: 'perihal' },
            { data: 'tujuan_surat', name: 'tujuan_surat' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ],
        order: [[ 0, "desc" ]],
    });
});
</script>
@endpush