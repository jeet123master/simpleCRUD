!<!DOCTYPE html>
<html>
<head>
	<title>Add Book</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<section style="padding-top: 60px">
		<div class="container">
			<div class="col-md-6 offset-md-3">
				<div class="card-header">
					Edit Book
				</div>
				<div class="card-body">
					@if(Session::has('book_updated'))
					<div class="alert alert-success" role='alert'>
						{{Session::get('book_updated')}}
					</div>
					@endif
					<form action="{{route('book.update')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{$book->id}}">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" value="{{$book->name}}" class="form-control">
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" value="{{$book->author}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="file">Choose File</label>
							<input type="file" name="file" class="form-control" onchange="previewFile(this)">
							<img id="previewImg" alt="book image" src="{{asset('BookImages')}}/{{$book->bookpic}}" style="max-width: 130px;margin-top: 20px;">
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
			
		</div>
		
	</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
	function previewFile(input){
		var file=$("input[type=file]").get(0).files[0];
		if(file)
		{
			var reader = new FileReader();
			reader.onload = function(){
				$('#previewImg').attr("src",reader.result);
			}
			reader.readAsDataURL(file);
		}
	}
</script>

</body>

</html>