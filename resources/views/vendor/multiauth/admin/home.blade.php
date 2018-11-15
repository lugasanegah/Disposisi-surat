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
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif You are logged in to {{ config('multiauth.prefix') }} side!
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
            </div><!-- END column -->
        </div>
    </section>
@endsection