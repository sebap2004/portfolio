<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Toast extends Component
{
    public $message;
    public $type;
    #[On('show-toast')]
    public function showToast($message, $type = 'info')
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
