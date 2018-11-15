@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                @include('multiauth::message')
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Register New {{ ucfirst(config('multiauth.prefix')) }}</h4>
                    </header><!-- .widget-header -->                    
                    <hr class="widget-separator">                    
                    <div class="widget-body">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
                    <br><br>
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>                                                      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td> {{ $role->name }}</td>                                            
                                <td>
                                    {{ $role->admins->count() }} User
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                        @csrf @method('delete')
                                    </form>

                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection