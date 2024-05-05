<?php

namespace App\Http\Livewire;

use App\Enums\DisplayStatus;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PostComponent extends Component
{
    public Post $record;

    public function mount()
    {
        if ($this->record->status === DisplayStatus::DRAFT) {
            return Redirect::route('home');
        }
    }

    public function render()
    {
        return view('livewire.post',  ['record' => $this->record]);
    }
}
