<?php

namespace App\Http\Livewire;

use App\Models\DynamicConfig;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class AboutComponent extends Component
{
    public $record;

    public function mount()
    {
        $this->record = (object)[
            'title' => __('app.about.title'),
            'content' => DynamicConfig::getConfig('about_us_section1'),
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'featured_image' => 'https://via.placeholder.com/800x600',
        ];
    }

    public function render()
    {
        return view('livewire.about');
    }
}
