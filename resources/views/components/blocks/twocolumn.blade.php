@props([ 'left' => null, 'right' => null, ])
<div
  class="mt-4 grid w-full justify-between gap-x-6 gap-y-5 text-center md:grid-cols-2"
>
  @if($left)
  <x-blocks.partials.column-content
    :subtitle_text="$left['subtitle_text']"
    :subtitle_level="$left['subtitle_level']"
    :heading_text="$left['heading_text']"
    :heading_level="$left['heading_level']"
    :heading_size="$left['heading_size']"
    :image="$left['image']"
    :buttons="$left['buttons']"
  />
  @endif @if($right)
  <x-blocks.partials.column-content
    :subtitle_text="$right['subtitle_text']"
    :subtitle_level="$right['subtitle_level']"
    :heading_text="$right['heading_text']"
    :heading_level="$right['heading_level']"
    :heading_size="$right['heading_size']"
    :image="$right['image']"
    :buttons="$right['buttons']"
  />
  @endif
</div>
