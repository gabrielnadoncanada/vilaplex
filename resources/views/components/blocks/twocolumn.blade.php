@props([
    'left' => null,
    'right' => null,
])
<div class="mt-4 grid md:grid-cols-2  gap-x-6 gap-y-5 justify-between text-center w-full">
    @if($left)
        <x-blocks.partials.column-content
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
            :subtitle_text="$right['subtitle_text']"
            :subtitle_level="$right['subtitle_level']"
            :heading_text="$right['heading_text']"
            :heading_level="$right['heading_level']"
            :heading_size="$right['heading_size']"
            :buttons="$right['buttons']"
        />
    @endif
</div>

