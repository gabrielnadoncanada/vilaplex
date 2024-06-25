<div class="{{"slider-template-$template"}}">
    @if($template != 'full-screen')
        <x-blocks.partials.slider.navigation class="p-0-40"/>
    @endif
    <div class="swiper-container ">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <div class="slider-item">
                        <div class="slider-item-frame">
                            <div class="slider-item-cover-frame">
                                <x-blocks.fields.image
                                    :image="$slide['image']"
                                    class="item-cover position-right"
                                    src="{{ Storage::url($slide['image']) }}"
                                    data-swiper-parallax="500"
                                    data-swiper-parallax-scale="1.4"
                                />
                                <div class="cover-overlay"></div>
                                <div class="loading-curtain"></div>
                            </div>
                            <div class="main-title-frame">
                                <div class="container">
                                    <div class="main-title d-grid row-gap-3" data-swiper-parallax-x="30%"
                                         data-swiper-parallax-scale=".7" data-swiper-parallax-opacity="0"
                                         data-swiper-parallax-duration="1000">
                                        <x-blocks.fields.subtitle
                                            :subtitle="$slide['subtitle']"
                                        />
                                        <x-blocks.fields.heading
                                            :heading_level="$slide['heading_level']"
                                            :heading_size="$slide['heading_size']"
                                            :heading_text="$slide['heading_text']"
                                            :split="true"
                                        />
                                        <x-blocks.fields.text
                                            :text="$slide['text']"
                                            class="max-w-350px"
                                        />

                                        <x-blocks.fields.buttons
                                            :buttons="$slide['buttons']"
                                        />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if($template == 'full-screen')
        <x-blocks.partials.slider.pagination/>
        <x-blocks.partials.slider.navigation/>
    @endif
</div>

