<div class="swiper-slide">
    <div class="project-slider-item">
        <div class="project-frame project-half">
            <div class="cover-frame">
                <x-blocks.fields.image
                    :image="$slide['image']"
                    class="project-cover position-right"
                    src="{{ Storage::url($slide['image']) }}"
                    alt="Project"
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
