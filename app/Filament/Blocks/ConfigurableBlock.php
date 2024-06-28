<?php

namespace App\Filament\Blocks;

use App\Filament\Fields\UrlSelectionField;
use Closure;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Field;

class ConfigurableBlock extends Block
{
    /**
     * @var array $fields List of fields.
     */
    protected $fields = [];

    /**
     * @var array $fieldClosures Associative array of field closures.
     */
    protected $fieldClosures = [];

    /**
     * Configures a field with the provided closure.
     *
     * @param string $fieldName The name of the field to configure.
     * @param Closure $closure The closure to apply to the field.
     * @return self Returns the current instance for method chaining.
     */
    public function configureField(string $fieldName, Closure $closure): self
    {
        $this->fieldClosures[$fieldName] = $closure;
        $this->applyFieldClosures($this->childComponents);

        return $this;
    }

    /**
     * Applies the configured closures to the components schema.
     *
     * @param array $schema The schema to apply the closures to.
     * @return array The modified schema.
     * @throws \ReflectionException
     */
    protected function applyFieldClosures(array $schema): array
    {
        foreach ($schema as $index => $component) {
            // Recursively apply closures to child components if present
            if ($component instanceof UrlSelectionField) {
                return $schema;
            }

            if (!empty($component->getChildComponents())) {
                $component->schema($this->applyFieldClosures($component->getChildComponents()));
            } // Apply the closure if the component is a Field and has a configured closure
            elseif ($component instanceof Field) {
                $fieldName = $component->getName();
                if (isset($this->fieldClosures[$fieldName])) {
                    $closure = $this->fieldClosures[$fieldName];
                    $schema[$index] = $closure($component);
                }
            }
        }

        return $schema;
    }
}
