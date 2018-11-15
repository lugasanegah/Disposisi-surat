@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                @include('multiauth::message')
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">{{ ucfirst(config('multiauth.prefix')) }} List</h4>
                    </header><!-- .widget-header -->                    
                    <hr class="widget-separator">
                    <div class="widget-body">
                    <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                    <br><br>
                    @include('multiauth::message')
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>                                                      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>                                            
                                <td>
                                    @foreach ($admin->roles as $role)
                                        <button class="btn btn-success btn-xs">{{ $role->name }}</button>
                                    @endforeach
                                </td>
                                <td><a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>

                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a></td>
                            </tr>
                            @endforeach @if($admins->count()==0)
                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                        @endif
                        </tbody>
                    </table>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection