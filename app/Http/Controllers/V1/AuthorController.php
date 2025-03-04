<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::with('books')->get()->toArray();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'bio' => ['required'],
            'birth_date' => ['required', 'date'],
        ]);

        return Author::create($data);
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => ['required'],
            'bio' => ['required'],
            'birth_date' => ['required', 'date'],
        ]);

        $author->update($data);

        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json();
    }
}
