<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateAlbumForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAlbum extends Component
{
    use WithFileUploads;

    public CreateAlbumForm $form;


    public function create()
    {
        $this->form->create();
        return redirect('/app')->with('success', 'Album created');
    }

    public function render()
    {
        return view('livewire.create-album')->layout("components.layout.app");
    }
}
