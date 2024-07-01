@props([
    'left' => null,
    'right' => null,
])
<div class="flex title-center mt-4">
    @if($left)
        <x-blocks.partials.column-content
            class="col-lg-6"
            :subtitle_text="$left['subtitle_text']"
            :subtitle_level="$left['subtitle_level']"

            :heading_text="$left['heading_text']"
            :heading_level="$left['heading_level']"
            :heading_size="$left['heading_size']"
            :buttons="$left['buttons']"
        />
    @endif
    @if($right)
        <x-blocks.partials.column-content
            class="col-lg-6"
            :subtitle_text="$right['subtitle_text']"
            :subtitle_level="$right['subtitle_level']"
            :heading_text="$right['heading_text']"
            :heading_level="$right['heading_level']"
            :heading_size="$right['heading_size']"
            :buttons="$right['buttons']"
        />
    @endif
</div>

