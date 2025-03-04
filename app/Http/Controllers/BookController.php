<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        $books = Book::all()->sortByDesc('created_at');
        $bookChunks = $books->chunk(3);
        return view('book.books', compact('books', 'authors', 'bookChunks'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.book', compact('book'));
    }
}
