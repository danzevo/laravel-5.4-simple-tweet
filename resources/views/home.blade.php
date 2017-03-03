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
						@endphp
						
					<div class='well well-sm' style='background-color:#{{ $background }} !important'>
						<ul class='media-list'>
							<li class='media'>
								<div class='media-left'>
									<a href='#'>
										<img class='media-object' src='' alt=''>
									</a>
								</div>
								<div class='media-body'>
									<div @if($allow) class='pull-right' @endif>
										<h4 class="media-heading">{{ $row->user->name }}</h4>
										{{ $row->text }}
									</div>
								</div>
							</li>
						</ul>
					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
