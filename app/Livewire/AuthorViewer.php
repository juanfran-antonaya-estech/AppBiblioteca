<?php

namespace App\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorViewer extends Component
{

    public $isEditing = false;
    public $authorId;

    /**
     * @var Author
     */
    public $author;

    public $name;
    public $bio;
    public $birth_date;

    public $deleteConfirm = false;

    public function mount(){
        $this->author = Author::find($this->authorId);
        $this->name = $this->author->name;
        $this->bio = $this->author->bio;
        $this->birth_date = $this->author->birth_date;
    }

    public function showEditForm(){
        $this->isEditing = true;
    }

    public function hideEditForm(){
        $this->isEditing = false;
    }

    public function save(){
        $this->validate([
            'name' => 'required|min:3|max:50',
            'bio' => 'required|min:10|max:255',
            'birth_date' => 'required|date|before:today'
        ]);
        $this->author->update($this->only('name', 'bio', 'birth_date'));
        $this->author->save();
        $this->hideEditForm();
    }

    public function delete(){
        if($this->deleteConfirm){
            $this->author->delete();
            $this->redirect(route('authors.index'));
        } else {
            $this->deleteConfirm = true;
        }
    }
    public function render()
    {
        return view('livewire.author-viewer');
    }
}
