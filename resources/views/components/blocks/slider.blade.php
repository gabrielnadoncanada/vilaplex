<div class="swiper-container main-slider">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide">
                <div class="project-slider-item">
                    <div class="project-frame project-half">
                        <div class="cover-frame">
                            @if($slide['image'])
                                <img class="project-cover position-right"
                                     src="{{ Storage::url($slide['image'])}}"
                                     alt="Project" data-swiper-parallax="500"
                                     data-swiper-parallax-scale="1.4">
                            @endif
                            <div class="cover-overlay"></div>
                            <div class="loading-curtain"></div>
                        </div>
                        <div class="main-title-frame">
                            <div class="container">
                                <div class="main-title" data-swiper-parallax-x="30%"
                                     data-swiper-parallax-scale=".7" data-swiper-parallax-opacity="0"
                                     data-swiper-parallax-duration="1000">
                                    @if($slide['subtitle'])
                                        <div class="subtitle mb-20">{{ $slide['subtitle'] }}</div>
                                    @endif
                                    @php
                                        $title = trim($slide['title']);
                                        $newlinePos = strrpos($title, "\n");

                                        if ($newlinePos !== false) {
                                               $part1 = substr($title, 0, $newlinePos);
                                               $part2 = substr($title, $newlinePos + 1);
                                           } else {
                                               $part1 = $title;
                                               $part2 = '';
                                           }
                                       $part1 = str_replace("\n", "", $part1);
                                       $part2 = str_replace("\n", "", $part2);
                                    @endphp
                                    @if($part1 || $part2)
                                        <h1 class="h1 mb-30">
                                            {{ trim($part1) }}
                                            @if($part2)
                                                <br>
                                                <span class="border-text">{{ trim($part2) }}</span>
                                                <span class="animation-el"></span>
                                            @endif
                                        </h1>
                                    @endif
                                    @if($slide['description'])
                                        <div class="text mb-30 max-w-350px">
                                            {!! $slide['description'] !!}
                                        </div>
                                    @endif
                                    @if($slide['primary_action']['type'])
                                        @if($slide['primary_action']['type'] !== 'External')
                                            @php
                                                $post = app($slide['primary_action']['type'])->find($slide['primary_action']['data']['url']);
                                                if($post)
                                                    $slide['primary_action']['data']['url'] = $post->slug;
                                            @endphp
                                        @endif
                                        <x-link :href="$slide['primary_action']['data']['url']">
                                            {{$slide['primary_action']['data']['label']}}
                                        </x-link>
                                    @endif

                                    @if($slide['secondary_action']['type'])
                                        @if($slide['secondary_action']['type'] !== 'External')
                                            @php
                                                $post = app($slide['secondary_action']['type'])->find($slide['secondary_action']['data']['url']);
                                                if($post)
                                                    $slide['secondary_action']['data']['url'] = $post->slug;
                                            @endphp
                                        @endif

                                        <x-link class="btn-text" :href="$slide['secondary_action']['data']['url']">
                                            {{$slide['secondary_action']['data']['label']}}
                                        </x-link>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="slider-pagination-frame">
    <div class="slider-pagination"></div>
</div>
<div class="slider-nav-panel">
    <div class="container">
        <div class="slider-progress-bar-frame">
            <div class="slider-progress-bar">
                <div class="progress"></div>
            </div>
        </div>
    </div>

    <div class="slider-arrows">
        <div class="label">Navigation</div>
        <div class="button-prev magnetic-link"><span class="magnetic-object"><i class="fas fa-arrow-left"></i></span></div>
        <div class="button-next magnetic-link"><span class="magnetic-object"><i class="fas fa-arrow-right"></i></span></div>
    </div>
</div>



