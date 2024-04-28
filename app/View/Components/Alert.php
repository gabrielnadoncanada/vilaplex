<?php

namespace App\View\Components;

use App\Concerns\Themeable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    use Themeable;

    public $type;

    public $message;

    public function __construct($type = 'success', $message = false, $theme = 'success')
    {
        $this->type = $type;
        $this->message = $message;
        $this->theme = $theme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
