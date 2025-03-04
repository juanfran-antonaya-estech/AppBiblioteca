<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        $authorChunks = $authors->chunk(3);
        return view('author.authors', compact('authorChunks', 'authors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('author.author', compact('author'));
    }
}
