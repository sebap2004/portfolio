<?php

namespace App\Livewire;

use App\Models\Album;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ViewAlbum extends Component
{
    public Album $album;

    public function render()
    {
        return view('livewire.view-album')->layout('components.layout.app');
    }
}
