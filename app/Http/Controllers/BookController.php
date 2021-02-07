<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    function addBook()
    {
    	return view('add-Book');
    }

    function store(Request $request)
    {
    	$name = $request->name;
    	$author = $request->author;
    	$image = $request->file('file');
    	$imageName = time().'.'.$image->extension();
    	$image->move(public_path('BookImages'),$imageName);

    	$book = new Book();
    	$book->name = $name;
    	$book->author = $author;
    	$book->bookpic = $imageName;
    	$book->save();
    	return back()->with('Book_added','Book added successfully');

    }
    function books()
    {
    	$books = Book::all();
    	return view('all-books',compact('books'));
    }

    function editBook($id)
    {
    	$book = Book::find($id);
    	return view('edit-book',compact('book'));
    }

    function updateBook(Request $request)
    {
    	$name = $request->name;
    	$author = $request->author;
    	$image = $request->file('file');
    	$imageName = time().'.'.$image->extension();
    	$image->move(public_path('BookImages'),$imageName);
    	$book = Book::find($request->id);
    	$book->name = $name;
    	$book->author = $author;
    	$book->bookpic = $imageName;
    	$book->save();

    	return back()->with('book_updated', 'Book updated successfully!');
    }
    function deleteBook($id)
    {
    	$book = Book::find($id);
    	unlink(public_path('BookImages').'/'.$book->bookpic);
    	$book->delete();
    	return back()->with('book_deleted', 'Book deleted successfully!');

    }
}
