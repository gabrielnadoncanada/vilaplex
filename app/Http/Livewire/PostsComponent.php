<?php

namespace App\Http\Livewire;

use App\Enums\DisplayStatus;
use App\Models\DynamicConfig;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PostsComponent extends Component
{
    public $record;

    public function mount()
    {
        $this->record = (object)[
            'featured_image' => 'https://via.placeholder.com/800x600',
            'items' => Post::all()
        ];
    }

    public function render()
    {
        return view('livewire.posts',  ['record' => $this->record]);
    }
}
