@extends('layouts.app') @section('content')
<div class='container'>
	<div class='d-flex justify-content-center'>
		@include("books.download", compact('book'))
	</div>
	<div class="text-center">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tellus nisi, eget pulvinar in, molestie et arcu.</p>
		<h2>Want to download? Just opent the book!</h2>
	</div>
</div>
@endsection