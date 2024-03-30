<?php

namespace App\Http\Livewire;


use App\Enums\DisplayStatus;
use App\Models\Page;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;


class PageComponent extends Component
{
    public Page $record;

    public function mount()
    {
        if ($this->record->status === DisplayStatus::DRAFT) {
            return Redirect::route('home');
        }
    }

    public function render()
    {
        return view('pages.templates.' . strtolower($this->record->template), ['record' => $this->record]);
    }
}
