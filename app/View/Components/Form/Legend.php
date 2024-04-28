<?php

namespace App\View\Components\Form;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use App\Concerns\Themeable;

class Legend extends Component
{
    use Themeable;

    public $for;
    public $value;

    public function __construct($for = null, $value = null, $theme = 'default')
    {
        $this->for = $for;
        $this->value = $value;
        $this->theme = $theme;
    }

    public function render()
    {
	    return $this->view('components.form.legend');
    }

    public function fallback()
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
