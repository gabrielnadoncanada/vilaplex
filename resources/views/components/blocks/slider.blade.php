<div class="swiper-container main-slider">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <x-blocks.partials.slider-item
                :slide="$slide"
            />
        @endforeach
    </div>
</div>
<x-blocks.partials.slider-pagination/>
<x-blocks.partials.slider-navigation/>
