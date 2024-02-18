<div class="mry-content-frame" id="scroll">
    <canvas class="mry-dots"></canvas>

    <div class="swiper-container mry-main-slider">
        <div class="swiper-wrapper">
            @foreach (App\Models\Service::all() as $index => $service)

                <div class="swiper-slide">

                    <!-- project -->
                    <div class="mry-project-slider-item">
                        <div class="mry-project-frame">
                            <div class="mry-cover-frame">
                                <img class="mry-project-cover mry-position-right"
                                     src="{{ Storage::temporaryUrl($service->featured_image, now()->addMinutes(5))}}"
                                     alt="Project" data-swiper-parallax="500"
                                     data-swiper-parallax-scale="1.4">
                                <div class="mry-cover-overlay mry-gradient-overlay"></div>
                            </div>
                            <div class="mry-main-title-frame">
                                <div class="container">
                                    <div class="mry-main-title" data-swiper-parallax-x="30%"
                                         data-swiper-parallax-scale=".7" data-swiper-parallax-opacity="0"
                                         data-swiper-parallax-duration="1000">
                                        @php
                                            $title = $service->title;
                                            $length = strlen($title);
                                            $part1Length = (int)($length * 0.75);
                                            $lastSpaceBefore75Percent = strrpos(substr($title, 0, $part1Length), ' ');
                                            $part1 = substr($title, 0, $lastSpaceBefore75Percent);
                                            $part2 = substr($title, $lastSpaceBefore75Percent);
                                        @endphp

                                        <div class="mry-subtitle mry-mb-20">{{$service->categories->first()->title}}</div>
                                        <h1 class="mry-mb-30">{{ trim($part1) }}<br><span class="mry-border-text">{{ trim($part2) }}</span><span class="mry-animation-el"></span></h1>
                                        <div class="mry-text mry-mb-30">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.<br>Adipisci distinctio iure, rerum non fugit.
                                        </div>
                                        <a class="mry-btn mry-default-link mry-anima-link" href="project.html">Open
                                            Case</a>
                                        <a class="mry-btn-text mry-default-link mry-anima-link"
                                           href="portfolio-grid-1.html">All Projects</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- project end -->

                </div>
            @endforeach


        </div>
    </div>

    <div class="mry-slider-pagination-frame">
        <div class="mry-slider-pagination"></div>
    </div>

    <div class="mry-slider-nav-panel">
        <div class="container">
            <div class="mry-slider-progress-bar-frame">
                <div class="mry-slider-progress-bar">
                    <div class="mry-progress"></div>
                </div>
            </div>
        </div>

        <div class="mry-slider-arrows">
            <div class="mry-label">Slider Navigation</div>
            <div class="mry-button-prev mry-magnetic-link"><span class="mry-magnetic-object"><i
                        class="fas fa-arrow-left"></i></span></div>
            <div class="mry-button-next mry-magnetic-link"><span class="mry-magnetic-object"><i
                        class="fas fa-arrow-right"></i></span></div>
        </div>
    </div>

</div>

