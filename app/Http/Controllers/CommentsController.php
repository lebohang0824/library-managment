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
    	
    	// Book comments
    	return response($book->first()->comments());
    }
}
