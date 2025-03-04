<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Author;

class BookMaker extends Component
{
    public $isModalOpen = false;

    public $authors = [];

    public $title = '';
    public $author_id = '';
    public $release_year = '';
    public $status = '0';

    public function openModal(){
        $this->isModalOpen = true;
    }

    public function closeModal(){
        $this->isModalOpen = false;
    }

    public function save(){
        $this->validate([
            'title' => 'required',
            'author_id' => 'required',
            'release_year' => 'required|lte:'.date('Y').'|min:4|max:4',
            'status' => 'required',
        ]);

        $book = Book::create($this->only('title', 'author_id', 'release_year', 'status'));
        $this->redirect(route('books.index'));
    }

    public function render()
    {
        $this->authors = Author::all()->sortByDesc('created_at');
        return view('livewire.book-maker');
    }
}
