@extends('multiauth::layouts.app') 
@section('content')



    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                @include('multiauth::message')
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Add New Role</h4>
                    </header><!-- .widget-header -->                    
                    <hr class="widget-separator">                    
                    <div class="widget-body">                
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection