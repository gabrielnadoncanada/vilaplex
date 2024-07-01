@props([
    'subtitle_text' => null,
    'subtitle_level' => 'span',
    'text' => null,
    'buttons' => [],
    'heading_level' => 'h2',
    'heading_size' => 'h2',
    'heading_text' => null,
])
<div {{$attributes}}>
    <x-text :as="$subtitle_level" theme="subtitle.center">
        {{$subtitle_text}}
    </x-text>
    <x-blocks.fields.heading
        :heading_level="$heading_level"
        :heading_size="$heading_size"
        :heading_text="$heading_text"/>
    <x-text as="div" class="max-w-[650px] mx-auto mb-[10px]">
        {!! $text !!}
    </x-text>

    <x-blocks.fields.buttons
        :buttons="$buttons"
    />
</div>

