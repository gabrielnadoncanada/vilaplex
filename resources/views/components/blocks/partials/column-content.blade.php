@props([
    'subtitle' => null,
    'text' => null,
    'buttons' => [],
    'heading_level' => 'h2',
    'heading_size' => 'h2',
    'heading_text' => null,
])
<div {{$attributes}}>
    <x-blocks.fields.subtitle
        :subtitle="$subtitle"
    />
    <x-blocks.fields.heading
        :heading_level="$heading_level"
        :heading_size="$heading_size"
        :heading_text="$heading_text"/>
    <x-blocks.fields.text
        :text="$text"
        class="fo max-w-450px mx-auto"
    />
    <x-blocks.fields.buttons
        :buttons="$buttons"
    />
</div>

