<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

class BookViewer extends Component
{
    public $bookId;

    /**
     * @var Book
     */
    public $book;

    public $title;
    public $author_id;
    public $release_year;
    public $status;

    public $deleteConfirm = false;

    public $isEditing = false;

    public $authors;


    public function mount($bookId){
        $this->book = Book::findOrFail($bookId);

        $this->title = $this->book->title;
        $this->author_id = $this->book->author_id;
        $this->release_year = $this->book->release_year;

        $this->authors = Author::all();
    }
    public function save(){

        $this->validate([
            'title' => 'required',
            'author_id' => 'required',
            'release_year' => 'required|lte:'.date('Y').'|min:4|max:4',
        ]);

        $this->book->update($this->only('title', 'author_id', 'release_year'));
        $this->book->save();

        $this->hideEditForm();
    }

    public function showEditForm(){
        $this->isEditing = true;
    }

    public function hideEditForm(){
        $this->isEditing = false;
    }

    public function prestar(){
        $this->book->status = true;
        $this->book->user_id = Auth::user()->id;
        $this->book->save();
    }

    public function devolver(){
        $this->book->status = false;
        $this->book->user_id = null;
        $this->book->save();
    }

    public function delete(){
        if($this->deleteConfirm){
            $this->book->delete();
            $this->redirect(route('books.index'));
        } else {
            $this->deleteConfirm = true;
        }
    }

    public function goback(){
        $this->redirect(route('books.index'));
    }

    public function render()
    {
        return view('livewire.book-viewer');
    }
}
