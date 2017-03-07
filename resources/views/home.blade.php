@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default panel-primary">
                <div class="panel-heading">Twitter Application</div>
                <div class="panel-body">
					<div class='well'>
						<form id='form_update_status' class='form-horizontal' action='/home' method='post'>
							<div class='form-group'>
								{{ csrf_field() }}
								<div class='col-xs-12 col-md-12'>
									<input type='text' id='update_status' name='update_status' class='form-control' onkeydown="if(event.keyCode == 13) $('#form_update_status').submit()" placeholder='Update Status...... '>
									
									@if($errors->has('update_status'))
										<p> {{ $errors->first('update_status') }} </p>
									@endif
								</div>
							</div>
							<div class='form-group'>
								<div class='col-xs-12 col-md-12'>
									<button class='btn btn-primary pull-right' type='submit'>Update</button>
								</div>
							</div>
						</form>				
					</div>
					@foreach($tweet as $row)
						@php 
							$allow = 0;
							if(Auth::user()->id == $row->user->id) {
								$allow = 1; 
							}
							
							$background = 'FFFFFF'; 
							if($allow) {
								$background = 'DFF0D8'; 
							}
							
							if(Auth::user()->picture) {
								$source = '/img/'.Auth::user()->picture;
							} else {                   
								$source = '/img/no-image.png';
							}
						@endphp
						
					<div class='panel panel-default' style='background-color:#{{ $background }} !important'>
						<div class='panel-body'>							
							<div class="media">
								@if(!$allow)
								  <div class="media-left">
									<a href="#">
									  <img id='preview_image' src='{{ $source }}' width='75' class='media-object' alt='Foto Profil'>
									</a>
								  </div>
								@endif
								<div class="media-body">
									<div @if($allow) class='pull-right' @endif style='margin-top:2%'>
										<h4 class="media-heading">{{ $row->user->name }}</h4>
										{{ $row->text }}
									</div>	
								</div>
								@if($allow)
								<div class="media-right">
									<a href="#">
									  <img id='preview_image' src='{{ $source }}' width='75' class='media-object' alt='Foto Profil'>
									</a>
								</div>
								@endif
							</div>
						</div>							
					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
