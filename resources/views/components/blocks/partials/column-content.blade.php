@props([ 'subtitle_text' => null, 'subtitle_level' => 'span', 'text' => null,
'buttons' => [], 'heading_level' => 'h2', 'heading_size' => 'h2', 'heading_text'
=> null, ])
<div {{$attributes}}>
  <x-text :as="$subtitle_level" theme="subtitle.center">
    {{$subtitle_text}}
  </x-text>
    <x-text
        :as="$heading_level"
        :theme="$heading_size">
        {{$heading_text}}
    </x-text>

  <x-text as="div" class="mx-auto mb-[10px] max-w-[650px]">
    {!! $text !!}
  </x-text>

  <x-blocks.fields.buttons :buttons="$buttons" />
</div>
