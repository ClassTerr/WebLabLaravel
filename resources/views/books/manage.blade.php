@extends('layouts.app') @section('content')
<div class="container">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
	@endif
	<h2>Here you can manage site books</h2>
	<!-- add book form -->
	<div class="box">
		<h3>Add a book</h3>
		<form method="post" action="{{ url('books') }}" enctype="multipart/form-data">
			@csrf
			<label>Author</label>
			<input type="text" name="author" value="{{ old('author') }}" required />
			<label>Name</label>
			<input type="text" name="name" value="{{ old('name') }}" required />
			<label>Year</label>
			<input type="number" name="year" value="{{ old('year') }}" required />
			<label>Link</label>
			<input type="text" name="link" value="{{ old('link') }}" />
			<input type="submit" name="submit_add_book" value="Submit" />
		</form>
	</div>
	<!-- main content output -->
	<div class="box">
		<h3>List of books</h3>
		<table class="manage-table">
			<thead style="background-color: #ddd; font-weight: bold;">
				<tr>
					<td>Id</td>
					<td>Author</td>
					<td>Name</td>
					<td>Year</td>
					<td>Link</td>
					<td>DELETE</td>
					<td>EDIT</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($books as $book)
				<tr>
					<td>@if (isset($book->id)) {{htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8')}} @endif</td>
					<td>@if (isset($book->author)) {{htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8')}} @endif</td>
					<td>@if (isset($book->name)) {{htmlspecialchars($book->name, ENT_QUOTES, 'UTF-8')}} @endif</td>
					<td>@if (isset($book->year)) {{htmlspecialchars($book->year, ENT_QUOTES, 'UTF-8')}} @endif</td>
					<td>
						@if (isset($book->link))
						<a href="{{htmlspecialchars($book->link, ENT_QUOTES, 'UTF-8')}}">{{htmlspecialchars($book->link, ENT_QUOTES, 'UTF-8')}}</a>
						@endif
					</td>
					<td>
						<form action="{{ action('BooksController@destroy', $book['id']) }}" method="post">
							@csrf
							@method('DELETE')
							<!-- <input name="_method" type="hidden" value="DELETE"> -->
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
					<td>
						<form action="{{ action('BooksController@edit', $book->id) }}">
							<button class="btn btn-success" type="submit">Edit</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="text-center">
		{{ $books->links() }}
	</div>
</div>
@endsection