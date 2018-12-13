<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/shuffle.min.js') }}"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/stars.css') }}" rel="stylesheet">
	<link href="{{ asset('css/book.css') }}" rel="stylesheet">
	<link href="{{ asset('css/books.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bookshelf.css') }}" rel="stylesheet">
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
			 aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			@include('layouts.bookshelf')
			<div class="nav-item nav-link active books-project" href="#">BOOKS PROJECT
				<span class="sr-only">(current)</span>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<a class="order-1 nav-link" href="{{ route('home') }}">Home</a>
					@if (Auth::check())
					<a class="order-2 nav-link navbar-right" href="{{ url('books') }}">Books</a>
					@endif
					@if (Auth::check() and Auth::user()->is_admin)
					<a class="order-2 nav-link navbar-right" href="{{ route('books/manage') }}">Manage books</a>
					@endif
				</ul>
				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif @else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
						 aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
							<span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</nav>
		<script>
			var loc = window.location.href;
			$(".navbar .navbar-nav > a").each(function() {
				if (loc.endsWith($(this).attr('href'))) {
					$(this).addClass("active");
				}
			});
		</script>
		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>

</html>