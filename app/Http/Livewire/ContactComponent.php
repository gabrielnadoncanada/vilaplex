<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
