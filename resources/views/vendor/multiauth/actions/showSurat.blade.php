@extends('multiauth::layouts.app') 
@section('content')
    <section class="app-content">
	<div class="row">
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Detail Surat</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<form action="#" class="form-horizontal">
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Nama Surat</label>
								<div class="col-sm-5">
									<input class="form-control" readonly="true" type="text" value="{{ $surat->nama_surat }}">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Nomor Surat</label>
								<div class="col-sm-5">
									<input class="form-control" readonly="true" type="text" value="{{ $surat->nomor_surat }}">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Asal Surat</label>
								<div class="col-sm-5">
									<input class="form-control" readonly="true" type="text" value="{{ $surat->asal_surat }}">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Sifat Surat</label>
								<div class="col-sm-5">
									
									@if($surat->sifat == 'Biasa')
										{!! '<button class="btn btn-success">'.$surat->sifat.'</button>' !!}

									@elseif($surat->sifat == 'Edaran')
										{!! '<button class="btn btn-primary">'.$surat->sifat.'</button>' !!}

									@elseif($surat->sifat == 'Pengumuman')
										{!! '<button class="btn btn-warning">'.$surat->sifat.'</button>' !!}

									@else
										{!! '<button class="btn btn-danger">'.$surat->sifat.'</button>' !!}

									@endif
									
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Perihal</label>
								<div class="col-sm-5">
									<input class="form-control" readonly="true" type="text" value="{{ $surat->perihal }}">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Tujuan Surat</label>
								<div class="col-sm-5">
									<input class="form-control" readonly="true" type="text" value="{{ $surat->user->name }}">
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">Status Surat</label>
								<div class="col-sm-5">
									@if($surat->status == 'belum direview')
										{!! '<button class="btn btn-warning">New</button>' !!}

									@elseif($surat->status == 'lolos')
										{!! '<button class="btn btn-success">Reviewed</button>' !!}

									@else
										{!! '<button class="btn btn-danger">Rejected</button>' !!}									
									@endif
								</div>
							</div><!-- .form-group -->
							<div class="form-group">	
								<label for="#" class="col-sm-2 col-sm-offset-2 control-label">File Surat</label>
								<div class="col-sm-5">
									<a href="{{ asset('file/'.$surat->file) }}" class="btn btn-primary">Download</a>
								</div>
							</div><!-- .form-group -->
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->		
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Log History</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="m-b-lg">
							<small>
								Data Log Aktifitas <b>{{ $surat->nama_surat }}</b>
							</small>
						</div>
						<table class="table table-striped">
							<tbody>
								<tr>
									<th>Status</th>
									<th>Oleh</th>
									<th>Keterangan</th>
									<th>Waktu</th>
								</tr>
								@foreach($logSurat as $log)
								<tr>
									<td>
										@if($log->status == 'yes')
											{{ 'Telah Direview' }}

										@elseif($log->status == 'baru')
											{{ 'Pendataan Surat Masuk' }}

										@elseif($log->status == 'no')
											{{ 'Surat Di Tolak' }}

										@else
											{{ 'Disposisi Surat' }}

										@endif
									</td>
									<td>{{ $log->Admin->name }}</td>
									<td>{{ $log->keterangan }}</td>
									<td>{{ $log->created_at->diffForHumans() }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->

{{-- 			<div class="col-md-6">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Horizontal Form</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
						<div class="m-b-lg">
							<small>
								Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding <code>.form-horizontal</code> to the form (which doesn't have to be a <code>&lt;form&gt;</code>). Doing so changes <code>.form-groups</code> to behave as grid rows, so no need for <code>.row</code>.
							</small>
						</div>
						<form class="form-horizontal">
							<div class="form-group">
								<label for="exampleTextInput1" class="col-sm-3 control-label">Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="exampleTextInput1" placeholder="Your name">
								</div>
							</div>
							<div class="form-group">
								<label for="email2" class="col-sm-3 control-label">Email:</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email2" placeholder="Eamil address">
								</div>
							</div>
							<div class="form-group">
								<label for="textarea1" class="col-sm-3 control-label">Comment:</label>
								<div class="col-sm-9">
									<textarea class="form-control" id="textarea1" placeholder="Your comment..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3">
									<div class="checkbox checkbox-success">
										<input type="checkbox" id="checkbox-demo-2">
										<label for="checkbox-demo-2">View my email</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-9 col-sm-offset-3">
									<button type="submit" class="btn btn-success">Comment</button>
								</div>
							</div>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column --> --}}

		</div>
		</section>
@endsection