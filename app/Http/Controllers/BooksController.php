<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Book;
use App\Booking;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only' => ['getMyBooks', 'postRegisterBook']]);
    }

    public function getBook($ref) {
        return view('pages.book', ['book' => Book::whereRef($ref)->first()]);
    }

    public function getBooks() {
        return response(Book::get());
    }

    public function getMyBooks() {
        
        $myAddedBooks = Book::whereUserId(Auth::id())->get();
        $bookedBooks = Booking::whereUserId(Auth::id())->whereAvailability(false)->get();
        $borrowedBooks = Booking::whereUserId(Auth::id())->whereAvailability(true)->get();
        return view('pages.my-books', [
            'myAddedBooks' => $myAddedBooks, 
            'bookedBooks' => $bookedBooks, 
            'borrowedBooks' => $borrowedBooks
        ]);
    }

    public function postBorrowBook(Request $request) {

        $request->validate([
            'isbn'       => 'required|min:10',
            'title'      => 'required|min:2',
            'from'       => 'required|date',
            'return'     => 'required|min:2',
            'availability' => 'required',
        ]);

        if (!Auth::check()) {
            return response([
                'success' => false,
                'message' => 'You need to be logged in.',
                'data' => []
            ]);
        }
        
        $book = Book::whereIsbn(str_replace('-', '', $request->isbn))->whereTitle($request->title);        

        if ($book->exists()) {

            // Check if the book is reserved
            $booked = isBookAvailable(
                $book->first(),
                Carbon::parse($request->from),
                Carbon::parse($request->from)->add('7 Days')
            );

            if ($booked) {
                return response([
                    'success' => false,
                    'message' => 'Book not available on the selected dates.',
                    'data' => $book->first()
                ]);
            }

            $from = Carbon::parse($request->from);
            $till = Carbon::parse($request->return);

            // Response
            $response = response([
                'success' => true,
                'message' => 'Book request approved successfully.',
                'data' => $book->first()
            ]);

            // Create booking for the book
            $book->first()->bookings()->create([
                'user_id'       => Auth::id(),
                'from'          => $from,
                'till'          => $till,
                'availability'  => $from->format('Y-m-d') == today()->format('Y-m-d') ? true : false,
            ]);

            // Update book if not booked
            if ($book->first()->booked == false && $from->format('Y-m-d') == today()->format('Y-m-d')) {
                $book->first()->update(['booked' => true]);
            }

            return $response;
        }

        return response([
            'success' => false,
            'message' => 'Book not available.',
            'data' => $book->first()
        ]);
    }

    public function postRegisterBook(Request $request) {
       
        $request->validate([
            'isbn'       => 'required|min:10',
            'title'      => 'required|min:2',
            'author'     => 'required|min:2',
            'cover'      => 'required',
            'terms'      => 'required',
        ]);

        // 
        $isbn = str_replace('-', '', $request->isbn);

        if (Book::whereIsbn($isbn)->exists()) {
            return response([
                'success' => false,
                'message' => 'A book with the same ISBN exists in our record.',
                'data' => []
            ]);
        }

        $file = $request->file('cover');

        $name = Str::random(25);
        $extension = $file->getClientOriginalExtension();
        $destination =  public_path(). '/images/uploads';

        // Filename
        $filename = $name.'.'.$extension;


        $ref = Str::random(25);
        $title = $request->title;
        $author = $request->author;
        $image = '/images/uploads/'. $filename;
        $stars = 1;
        $booked = false;
        $category = $request->category;

        // Upload
        $file->move($destination, $filename);

        // Resize
        // Image::make('images/uploads/'. $filename)->resize(700, 550)->save('images/uploads/'. $filename);

        // Save to database
        $book = Book::create([
            'user_id' => Auth::id(),
            'ref' => $ref,
            'title' => $title,
            'author' => $author,
            'image' => $image,
            'stars' => $stars,
            'booked' => $booked,
            'category' => $category,
            'isbn' => $isbn
        ]);

        // Response
        return response([
            'success' => true,
            'message' => 'Book added successfully.',
            'data' => $book
        ]);
    }

    public function postReturnBook(Request $request) {

        $request->validate([
            'isbn' => 'required|min:10',
            'rate' => 'required',
        ]);

        if (!Auth::check()) {
            return response([
                'success' => false,
                'message' => 'You need to be logged in.',
                'data' => []
            ]);
        }
        
        $book = Book::whereIsbn(str_replace('-', '', $request->isbn));        

        if ($book->exists()) {
            
            $bookedBook = $book->first()->bookings()->whereUserId(Auth::id());

            if ($bookedBook->exists()) {
                // Delete booking
                $bookedBook->delete();

                // Update book
                $book->first()->update(['booked' => false]);

                // Comments
                if (!empty($request->comment)) {
                    $book->first()->comments()->create([
                        'user_id' => Auth::id(),
                        'body' => $request->comment,
                    ]);
                }

                // Rating

                return response([
                    'success' => true,
                    'message' => 'Thank you for your submission.',
                    'data' => $book->first()
                ]); 
            }

            return response([
                'success' => false,
                'message' => 'Book not available.',
                'data' => $book->first()
            ]);  
        }

        return response([
            'success' => false,
            'message' => 'Book not available.',
            'data' => $book->first()
        ]);        
    }

}
