@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">Twitter Application</div>
                <div class="panel-body">
					<div class='well'>
						<form id='form_profile' class='form-horizontal' action='/home/save_profile' method='post' enctype='multipart/form-data'>
							{{ csrf_field() }}
							<input type='hidden' name='_method' value='PUT'>
							
							<div class='row'>
								@if(Session::has('flash_message'))
									{!! session('flash_message') !!}
								@endif
								<div class='col-xs-3 col-md-3'>
									<div class='form-group'>
										<div class='col-xs-12 col-md-12'>
											@php
												if(Auth::user()->picture) {
													$source = '/img/'.Auth::user()->picture;
												} else {                   
													$source = '/img/no-image.png';
												}
											@endphp	
											<img id='preview_image' src='{{ $source }}' class='img-responsive img-circle' alt='Foto Profil'>
											<label class='col-md-offset-3 btn btn-primary'>
											Upload <input type='file' id='foto' name='foto' style='display:none;'>
											</label>
											@if($errors->has('foto'))
												<p class='text-danger'> {{ $errors->first('foto') }} </p>
											@endif
										</div>
									</div>
									
								</div>
								<div class='col-xs-9 col-md-9'>
									<div class='form-group'>
										<div class='col-xs-12 col-md-12'>
											<input type='text' id='name' name='name' class='form-control' value='{{ Auth::user()->name }}' placeholder='Username'>
											
											@if($errors->has('name'))
												<p class='text-danger'> {{ $errors->first('name') }} </p>
											@endif
										</div>
									</div>
									<div class='form-group'>
										<div class='col-xs-12 col-md-12'>
											<input type='email' id='email' name='email' class='form-control' value='{{ Auth::user()->email }}' placeholder='Email'>
											
											@if($errors->has('email'))
												<p class='text-danger'> {{ $errors->first('email') }} </p>
											@endif
										</div>
									</div>
									<div class='form-group'>
										<div class='col-xs-12 col-md-12'>
											<input type='password' id='password' name='password' class='form-control' value='' placeholder='password'>
											
											@if($errors->has('password'))
												<p class='text-danger'> {{ $errors->first('password') }} </p>
											@endif
										</div>
									</div>
									<div class='form-group'>
										<div class='col-xs-12 col-md-12'>
											<button class='btn btn-primary pull-right' type='submit'>Save</button>
										</div>
									</div>
								</div>
							</div>
						</form>				
					</div>					
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection