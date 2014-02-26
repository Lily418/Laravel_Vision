@extends('layout')

@section('css')
#fileUpload {
	display:inline;
}
@stop

@section('content')
	<h2>Input:</h2>
	<img src="/image/{{{ $inputId }}}" />

	<h2>Prediction: {{{ $user->name }}}</h2>
	@foreach ($images as $image)
		<img src="/image/{{{ $image-> id }}}" />
	@endforeach
@stop