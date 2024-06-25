<div class="row title-center mt-4">
    @if($left)
        <x-blocks.partials.column-content
            class="col-lg-6"
            :subtitle="$left['subtitle']"
            :heading_text="$left['heading_text']"
            :heading_level="$left['heading_level']"
            :heading_size="$left['heading_size']"
            :buttons="$left['buttons']"
        />
    @endif
    @if($right)
        <x-blocks.partials.column-content
            class="col-lg-6"
            :subtitle="$right['subtitle']"
            :heading_text="$right['heading_text']"
            :heading_level="$right['heading_level']"
            :heading_size="$right['heading_size']"
            :buttons="$right['buttons']"
        />
    @endif
</div>

