@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                @include('multiauth::message')
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Add Review</h4>
                    </header><!-- .widget-header -->                    
                    <hr class="widget-separator">                    
                    <div class="widget-body">                
                    <form action="{{ route('admin.saveDisposisi', ['id' => $id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="role">Status</label>
                            <select name="tujuan_surat" class="form-control">
                            @foreach($dataUser as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('surat.index') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection