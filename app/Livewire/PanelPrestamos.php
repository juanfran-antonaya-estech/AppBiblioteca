<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PanelPrestamos extends Component
{
    /**
     * @var Array<Book>
     */
    public $lendedList;

    public function mount(){
        $this->lendedList = Book::where('user_id', Auth::id())->get();
    }

    public function devolverLibro($id)
    {
        $book = Book::find($id);
        $book->status = false;
        $book->user_id = null;
        $book->save();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.panel-prestamos');
    }
}
