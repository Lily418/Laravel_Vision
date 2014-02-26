@extends('layout')

@section('css')
	#actions {
		text-align:center;
	}
@stop

@section('content')
	<h2>Possible Actions</h2>
	<div class="row" id="actions">
		<h3 class="col-md-6"><a href="image/upload_form">Upload training image</a></h3>
		<h3 class="col-md-6"><a href="image/identify_form">Identify face</a></h3>
	</div>
@stop