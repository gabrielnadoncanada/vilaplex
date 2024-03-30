<?php

namespace App\Http\Livewire;

use App\Enums\DisplayStatus;
use App\Models\Service;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ServiceComponent extends Component
{
    public Service $record;

    public function mount()
    {
        if ($this->record->status === DisplayStatus::DRAFT) {
            return Redirect::route('home');
        }
    }

    public function render()
    {
        return view('livewire.service',  ['record' => $this->record]);
    }
}
