<html>
<body>
	<h1>{{{ $user->name }}}</h1>
	@foreach ($images as $image)
		<img src="/image/{{{ $image-> id}}}" />
	@endforeach
</body>
</html>