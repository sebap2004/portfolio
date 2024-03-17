<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateAlbumAdminForm;
use App\Livewire\Forms\CreateAlbumForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminNewAlbum extends Component
{
    use WithFileUploads;

    public CreateAlbumAdminForm $form;

    public function create()
    {
        $this->form->create();
        return redirect('/admin')->with('success', 'Album created');
    }

    public function render()
    {
        return view('livewire.admin-new-album')->layout('components.layout.admin');
    }
}
