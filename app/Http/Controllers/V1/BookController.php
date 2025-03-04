<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->get()->toArray();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'author_id' => ['required', 'exists:authors'],
            'release_year' => ['required', 'integer'],
            'status' => ['boolean'],
        ]);

        return Book::create($data);
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required'],
            'author_id' => ['required', 'exists:authors'],
            'release_year' => ['required', 'integer'],
            'status' => ['boolean'],
        ]);

        $book->update($data);

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json();
    }
}
