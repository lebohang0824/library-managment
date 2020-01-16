<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function getBookComments($ref) {

    	// Find book
    	$book = Book::whereRef($ref);

    	// Book not found
    	if (!$book->exists()) return response('Book not found', 404);
    	
        // Comments
    	$comments = $book->first()->comments()->with('user')->orderBy('id', 'desc')->take(3)->get();

    	// Book comments
    	return response($comments);
    }
}
