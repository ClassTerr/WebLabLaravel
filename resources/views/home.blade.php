@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 book-image" style="background-image: url({{ asset('img/landing-book-2.png') }});"></div>
		<div class="col-md-6 col-md-offset-6">
			<h2>Welcome to Books project. Here you can get the best books in the world for free</h2>
			<h2>
				@guest To get books you need please
				<a href="{{ route('login') }}">Sign In</a> or @if (Route::has('register'))
				<a href="{{ route('register') }}">Sign Up</a>
				@endif @else Hi,
				<span class="text-success">
					{{ Auth::user()->name }}
				</span> Have fun with
				<a href="{{ route('books') }}">access to our free books</a>
				@endguest
			</h2>
		</div>
	</div>
</div>
@endsection