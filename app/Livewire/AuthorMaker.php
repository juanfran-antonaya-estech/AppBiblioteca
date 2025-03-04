<?php

namespace App\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorMaker extends Component
{
    public $isModalOpen = false;

    public $name = '';
    public $bio = '';
    public $birth_date = '';

    public function save(){
        $this->validate([
            'name' => 'required',
            'bio' => 'required',
            'birth_date' => 'required|date|before:today',
        ]);

        Author::create($this->only('name', 'bio', 'birth_date'));
        $this->redirect(route('authors.index'));
    }
    public function toggleModal(){
        $this->isModalOpen = !$this->isModalOpen;
    }
    public function render()
    {
        return view('livewire.author-maker');
    }
}
