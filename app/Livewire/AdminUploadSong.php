<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminSongForm;
use App\Livewire\Forms\SongForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminUploadSong extends Component
{
    use WithFileUploads;

    public AdminSongForm $form;
    public function create()
    {
        $this->form->create();
        return redirect('/admin')->with('success', 'Song created');
    }

    public function render()
    {
        return view('livewire.admin-upload-song')->layout('components.layout.admin');
    }
}
