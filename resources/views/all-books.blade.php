<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>All Books</h2>
  <p><a class="btn btn-success" href="{{route('addBook')}}">Add Book</a></p>            
  @if(Session::has('book_deleted'))
					<div class="alert alert-success" role='alert'>
						{{Session::get('book_deleted')}}
					</div>
					@endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Book Name</th>
        <th>Author Name</th>
        <th>Book Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($books as $book)
      <tr>
        <td>{{$book->name}}</td>
        <td>{{$book->author}}</td>
        <td><img src="{{asset('BookImages')}}/{{$book->bookpic}}" style="max-width: 60px;" /></td>
        <td>
        	<a class="btn btn-primary" href="/editBook/{{$book->id}}">Edit</a>
        	<a class="btn btn-danger" href="/deleteBook/{{$book->id}}">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>