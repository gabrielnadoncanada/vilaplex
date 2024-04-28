<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use App\Concerns\Themeable;

class Description extends Component
{
    use Themeable;

    public $for;
    public $value;

    public function __construct($for, $value = null, $theme = 'default')
    {
        $this->for = $for;
        $this->value = $value;
        $this->theme = $theme;
    }

    public function render()
    {
	    return $this->view('components.form.description');
	}
}
