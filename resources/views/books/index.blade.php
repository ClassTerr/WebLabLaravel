@extends('layouts.app') @section('content')
<div id="main-container" class="main-container books nav-effect-1">
	<!-- Main Section -->
	<div class="container">

		<div class="page-title category-title">
			<!-- <h1>Book Viewer</h1> -->
		</div>

		<section id="book_list container">

			<div class="toolbar row">
				<div class="filter-options small-12 medium-9 columns">
				</div>

				<div class="small-12 medium-3 columns">
					<select class="sort-options">
						<option value="" disabled selected>Sort by</option>
						<option value="">Featured</option>
						<option value="title">Alphabetical</option>
						<option value="date-created">Published</option>
					</select>
				</div>
			</div>

			<div class="grid-shuffle">
				<ul id="grid" class="row">
					@foreach ($books as $book)
						@include('templates.book', compact('book'))
					@endforeach
				</ul>
			</div>

		</section>

	</div>
</div>
<!-- /main -->

<div class="main-overlay">
	<div class="overlay-full"></div>
</div>

</div>

<script src="{{ asset('js/books.js') }}"></script>
@endsection