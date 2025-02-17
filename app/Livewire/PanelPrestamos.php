<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PanelPrestamos extends Component
{
    public $lendedList;
    public function render()
    {
        $this->lendedList = Book::where('status', '=', "1")
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('livewire.panel-prestamos');
    }
}
