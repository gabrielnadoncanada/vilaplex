<section class="col-lg-8 mx-auto mb-100 text-center d-grid row-gap-4">
    @if($section_number)
        <div class="numbering fo">
            @if($section_number)
                <div class="border-text">{{$section_number}}</div>
            @endif
            <x-blocks.fields.subtitle
                :subtitle="$subtitle"
            />
        </div>
    @endif
    <x-blocks.fields.heading
        :heading_size="$heading_size"
        :heading_level="$heading_level"
        :heading_text="$heading_text"
    />
    <x-blocks.fields.text
        :text="$text"
    />
    <x-blocks.fields.buttons
        :buttons="$buttons"
    />
    <x-render-blocks :blocks="$blocks"/>
</section>

