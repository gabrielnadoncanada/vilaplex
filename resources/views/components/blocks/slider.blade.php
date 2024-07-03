<div class="{{"slider-template-$template"}}">
    @if($template != 'full-screen')
        <x-blocks.partials.slider.navigation class="pb-10" />
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
                                    class="item-cover object-right"
                                    src="{{ Storage::url($slide['image']) }}"
                                    data-swiper-parallax="500"
                                    data-swiper-parallax-scale="1.4"
                                />
                                <div class="cover-overlay"></div>
                                <div class="loading-curtain"></div>
                            </div>
                            <div class="main-title-frame">
                                <div class="container">
                                    <div class="main-title grid grid-cols-1 gap-y-5" data-swiper-parallax-x="30%"
                                         data-swiper-parallax-scale=".7" data-swiper-parallax-opacity="0"
                                         data-swiper-parallax-duration="1000">
                                        <x-text :as="$slide['subtitle_level']" theme="subtitle">
                                            {{$slide['subtitle_text']}}
                                        </x-text>
                                        <x-text
                                            as="{{$slide['heading_level']}}"
                                            :theme="$slide['heading_size']"
                                            :split="true"
                                            :text="$slide['heading_text']"
                                        />

                                        <x-text as="div" class="max-w-[350px] mb-[10px]">
                                            {!! $slide['text'] !!}
                                        </x-text>
                                        <x-blocks.fields.buttons
                                            class="justify-self-start"
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
        <x-blocks.partials.slider.pagination />
        <x-blocks.partials.slider.navigation />
    @endif
</div>

