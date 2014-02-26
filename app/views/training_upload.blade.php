@extends('layout')

@section('css')
#fileUpload {
	display:inline;
}

.users_images {
	margin:10px;
}
@stop

@section('content')

	@include('image_upload')

	<h3>Images currently uploaded</h3>

	@foreach ($grouped_images as $image_group)
		<div class="users_images">
			{{{$image_group[1] -> name}}}
			@foreach($image_group[0] as $image)
			<img src="/image/{{{$image -> id}}}" />
			@endforeach
		</div>
	@endforeach
@stop