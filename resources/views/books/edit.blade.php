@extends('layouts.app') @section('content')
<div class="container">
	<!-- add book form -->
	<div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
		<h3>Edit a book</h3>
		<form action="{{ action('BooksController@update', $book->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
            @method('PUT')
			<label>Author</label>
			<input autofocus type="text" name="author" value="{{ htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8') }}" required />
			<label>Name</label>
			<input type="text" name="name" value="{{ htmlspecialchars($book->name, ENT_QUOTES, 'UTF-8') }}" required />
			<label>Year</label>
			<input type="number" name="year" value="{{ htmlspecialchars($book->year, ENT_QUOTES, 'UTF-8') }}" required />
			<label>Link</label>
			<input type="text" name="link" value="{{ htmlspecialchars($book->link, ENT_QUOTES, 'UTF-8') }}" />
			<input type="hidden" name="book_id" value="{{ htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8') }}" />
			<input type="submit" name="submit_update_book" value="Update" />
		</form>
	</div>
</div>
@endsection