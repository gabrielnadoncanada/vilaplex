<?php

namespace App\View\Components\Form;

use Illuminate\View\AppendableAttributeValue;
use Illuminate\View\Component;
use App\Concerns\Themeable;
use App\Concerns\HandlesValidationErrors;

abstract class Control extends Component
{
	use HandlesValidationErrors, Themeable;

	public $name;
	public $id;
	public $value;
	public $disabled;

	public function __construct($name = null, $id = null, $value = '', $bag = 'default', $disabled = false, $theme = 'default')
	{
		$this->name = $name ?? $id;
		$this->id = $id ?? $name;
		$sessionPath = self::sessionPath($name);
		$this->value = old($sessionPath, $value);
		$this->invalid = $this->errorBag($bag)->has($sessionPath);
		$this->disabled = $disabled;
		$this->theme = $theme;
	}

	public function controlAttributes()
	{
		$invalidAttributes = [];
		if ($this->invalid) {
			$invalidAttributes['aria-invalid'] = 'true';
			$invalidAttributes['aria-describedby'] = new AppendableAttributeValue($this->name.'_error');
		}

		return $this->attributes->merge([
				'name' => $this->name,
				'id' => $this->id,
				'disabled' => $this->disabled,
				'class' => $this->theme($this->disabled ? 'disabled' : ($this->invalid ? 'invalid' : 'normal')),
			] + $invalidAttributes);
	}
}

