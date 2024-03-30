<div class="mry-content-frame" id="scroll">
    <canvas class="mry-dots" style="display: none"></canvas>

    <div class="mry-head-bg">
        <img src="{{ Storage::url($record->featured_image)}}" alt="background">
        <div class="mry-bg-overlay"></div>
    </div>

    <div class="mry-banner mry-p-140-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="mry-main-title mry-title-center">
                    <div class="mry-subtitle mry-mb-20 mry-fo">{{__('app.service.subtitle')}}</div>
                    @php
                        $title = $record->title;
                        $length = strlen($title);
                        $part1Length = (int)($length * 0.75);
                        $lastSpaceBefore75Percent = strrpos(substr($title, 0, $part1Length), ' ');
                        $part1 = substr($title, 0, $lastSpaceBefore75Percent);
                        $part2 = substr($title, $lastSpaceBefore75Percent);
                    @endphp
                    <h1 class="mry-mb-20 mry-fo">{{ trim($part1) }}<br><span
                            class="mry-border-text">{{ trim($part2) }}</span><span class="mry-animation-el"></span></h1>
                    <div class="mry-text mry-fo max-w-350px">{{$record->excerpt}}</div>
                    <div class="mry-scroll-hint-frame">
                        <a class="mry-scroll-hint mry-smooth-scroll mry-magnetic-link mry-fo" href="#mry-anchor">
                            <span class="mry-magnetic-object"></span>
                        </a>
                        <div class="mry-label mry-fo">{{__('app.service.scroll_down')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $this->sectionCount = 0;
    @endphp
    @include('pages.templates.default', ['record' => $record])
    <!-- about -->
{{--    <div class="mry-about mry-p-100-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}


{{--                <div class="col-lg-8">--}}
{{--                    <div class="mry-mb-100 mry-text-center">--}}
{{--                        <div class="mry-numbering mry-fo">--}}
{{--                            <div class="mry-border-text">02</div>--}}
{{--                            <div class="mry-subtitle">What wy do?</div>--}}
{{--                        </div>--}}
{{--                        <h3 class="mry-mb-40 mry-fo">Relationships come first, everything <br>else follows</h3>--}}
{{--                        <p class="mry-text mry-fo">We take pride in having strong relationships with our clients. To--}}
{{--                            us, business is more than just a handshake and a signed contract.--}}
{{--                            Through our full suite of services, we help businesses reach--}}
{{--                            their goals and--}}
{{--                            maximize return on investment while focusing on transparency and communication.</p>--}}
{{--                        <p class="mry-text mry-fo">Contact us today for your <a href="contact.html"--}}
{{--                                                                                class="mry-default-link">free--}}
{{--                                consultation</a>.</p>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-10">--}}

{{--                    <div class="mry-about-video mry-mb-100 mry-fo">--}}
{{--                        <div class="mry-video-cover-frame">--}}
{{--                            <img class="mry-video-cover" src="img/light/content/video.jpg" alt="banner">--}}
{{--                            <div class="mry-cover-overlay"></div>--}}
{{--                            <div class="mry-play-button mry-magnetic-link">--}}
{{--                                <a class="mry-magnetic-object" data-fancybox href="https://vimeo.com/25428289"><i--}}
{{--                                        class="fas fa-play"></i></a>--}}
{{--                            </div>--}}
{{--                            <div class="mry-curtain"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="col-lg-8">--}}

{{--                    <div class="mry-numbering mry-fo">--}}
{{--                        <div class="mry-border-text">03</div>--}}
{{--                        <div class="mry-subtitle">Services</div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}

{{--                            <div class="mry-text-center mry-mb-100">--}}
{{--                                <h4 class="mry-mb-20 mry-fo">Website design<br>& Development</h4>--}}
{{--                                <p class="mry-text mry-mb-20 mry-fo">Our work empowers businesses to create unique--}}
{{--                                    user experiences that engage, captivate, and deliver results. Need your--}}
{{--                                    website designed in Toronto?</p>--}}
{{--                                <div class="mry-fo"><a href="contact.html" class="mry-link mry-default-link">Order a--}}
{{--                                        service</a></div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}

{{--                            <div class="mry-text-center mry-mb-100">--}}
{{--                                <h4 class="mry-mb-20 mry-fo">Creative<br>& Graphic Design</h4>--}}
{{--                                <p class="mry-text mry-fo">We are experienced storytellers, with a knack for--}}
{{--                                    incorporating brand insights into compelling designs for use in digital and--}}
{{--                                    print advertising campaigns.</p>--}}
{{--                                <div class="mry-fo"><a href="contact.html" class="mry-link mry-default-link">Order a--}}
{{--                                        service</a></div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}

{{--                            <div class="mry-text-center mry-mb-100">--}}
{{--                                <h4 class="mry-mb-20 mry-fo">Brand Marketing<br>& Strategy</h4>--}}
{{--                                <p class="mry-text mry-fo">We help businesses construct their identity and develop a--}}
{{--                                    tailored and concise brand strategy that will appeal to your target--}}
{{--                                    audience.</p>--}}
{{--                                <div class="mry-fo"><a href="contact.html" class="mry-link mry-default-link">Order a--}}
{{--                                        service</a></div>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}

{{--                            <div class="mry-text-center mry-mb-100">--}}
{{--                                <h4 class="mry-mb-20 mry-fo">Video Production<br>& Marketing</h4>--}}
{{--                                <p class="mry-text mry-fo">Our video production team films, produces, and edits--}}
{{--                                    content that will raise brand awareness, engagement, and conversion rates.--}}
{{--                                </p>--}}
{{--                                <div class="mry-fo"><a href="contact.html" class="mry-link mry-default-link">Order a--}}
{{--                                        service</a></div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-12">--}}

{{--                    <div class="mry-main-title mry-title-center mry-p-0-40">--}}
{{--                        <div class="mry-numbering mry-fo">--}}
{{--                            <div class="mry-border-text">04</div>--}}
{{--                            <div class="mry-subtitle">Employees</div>--}}
{{--                        </div>--}}
{{--                        <h2 class="mry-fo">Our Amazing Team</h2>--}}
{{--                        <div class="mry-arrows mry-fo">--}}
{{--                            <div class="mry-sl-nav">--}}
{{--                                <div class="mry-prev mry-button-team-prev mry-magnetic-link"><span--}}
{{--                                        class="mry-magnetic-object"><i class="fas fa-arrow-left"></i></span></div>--}}
{{--                                <div class="mry-next mry-button-team-next mry-magnetic-link"><span--}}
{{--                                        class="mry-magnetic-object"><i class="fas fa-arrow-right"></i></span></div>--}}
{{--                            </div>--}}
{{--                            <div class="mry-label mry-fo">Slider Navigation</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-lg-10">--}}

{{--                    <div class="swiper-container mry-team-slider mry-mb-100">--}}
{{--                        <div class="swiper-wrapper">--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-team-member mry-text-center">--}}
{{--                                    <div class="mry-member-photo-frame mry-fo">--}}
{{--                                        <img src="img/light/team/team-1.jpg" alt="Team member">--}}
{{--                                        <div class="mry-photo-overlay"></div>--}}
{{--                                        <div class="mry-curtain"></div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="mry-mb-10 mry-fo">Viktoria Freeman</h4>--}}
{{--                                    <p class="mry-text mry-simple-text mry-fo">UI/UX Designer</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-team-member mry-text-center">--}}
{{--                                    <div class="mry-member-photo-frame mry-fo">--}}
{{--                                        <img src="img/light/team/team-2.jpg" alt="Team member">--}}
{{--                                        <div class="mry-photo-overlay"></div>--}}
{{--                                        <div class="mry-curtain"></div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="mry-mb-10 mry-fo">Paul Trueman</h4>--}}
{{--                                    <p class="mry-text mry-simple-text mry-fo">UI/UX Designer</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-team-member mry-text-center">--}}
{{--                                    <div class="mry-member-photo-frame mry-fo">--}}
{{--                                        <img src="img/light/team/team-3.jpg" alt="Team member">--}}
{{--                                        <div class="mry-photo-overlay"></div>--}}
{{--                                        <div class="mry-curtain"></div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="mry-mb-10 mry-fo">Mike Oldman</h4>--}}
{{--                                    <p class="mry-text mry-simple-text mry-fo">UI/UX Designer</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-team-member mry-text-center">--}}
{{--                                    <div class="mry-member-photo-frame mry-fo">--}}
{{--                                        <img src="img/light/team/team-4.jpg" alt="Team member">--}}
{{--                                        <div class="mry-photo-overlay"></div>--}}
{{--                                        <div class="mry-curtain"></div>--}}
{{--                                    </div>--}}
{{--                                    <h4 class="mry-mb-10 mry-fo">Emma Newman</h4>--}}
{{--                                    <p class="mry-text mry-simple-text mry-fo">UI/UX Designer</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-lg-8">--}}

{{--                    <div class="mry-mb-100 mry-text-center">--}}
{{--                        <div class="mry-numbering mry-fo">--}}
{{--                            <div class="mry-border-text">05</div>--}}
{{--                            <div class="mry-subtitle">We can become partners</div>--}}
{{--                        </div>--}}
{{--                        <h3 class="mry-mb-40 mry-fo">We’re here to help, let us take it from here.</h3>--}}
{{--                        <p class="mry-text mry-fo">We know that transparency is non-negotiable and that strong--}}
{{--                            communication is the foundation of any great relationship. With the knowledge--}}
{{--                            and expertise at Brand & Mortar we are confident that we--}}
{{--                            can make an--}}
{{--                            impact on your business and its bottom line.</p>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-lg-12">--}}

{{--                    <div class="mry-main-title mry-title-center mry-p-0-40">--}}
{{--                        <div class="mry-numbering mry-fo">--}}
{{--                            <div class="mry-border-text">06</div>--}}
{{--                            <div class="mry-subtitle">Testimonials</div>--}}
{{--                        </div>--}}
{{--                        <h2 class="mry-fo">Our customers say</h2>--}}
{{--                        <div class="mry-arrows">--}}
{{--                            <div class="mry-sl-nav mry-fo">--}}
{{--                                <div class="mry-prev mry-button-testimonials-prev mry-magnetic-link"><span--}}
{{--                                        class="mry-magnetic-object"><i class="fas fa-arrow-left"></i></span></div>--}}
{{--                                <div class="mry-next mry-button-testimonials-next mry-magnetic-link"><span--}}
{{--                                        class="mry-magnetic-object"><i class="fas fa-arrow-right"></i></span></div>--}}
{{--                            </div>--}}
{{--                            <div class="mry-label mry-fo">Slider Navigation</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-lg-8">--}}

{{--                    <div class="swiper-container mry-testimonials-slider">--}}
{{--                        <div class="swiper-wrapper">--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-title-center">--}}
{{--                                    <img src="img/light/clients/c-1.jpg" alt="client"--}}
{{--                                         class="mry-reviewer mry-mb-20 mry-fo">--}}
{{--                                    <h4 class="mry-mb-20 mry-fo">Emma Newman</h4>--}}
{{--                                    <div class="mry-subtitle mry-mb-20 mry-fo">Creative director</div>--}}
{{--                                    <p class="mry-text mry-fo">We evaluated numerous marketing firms and selected--}}
{{--                                        Mireya due to their experience in the solar industry, and the clear--}}
{{--                                        understanding of our business objectives that they demonstrated during the--}}
{{--                                        evaluation--}}
{{--                                        process. </p>--}}
{{--                                    <ul class="mry-star-rate mry-fo">--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-title-center">--}}
{{--                                    <img src="img/light/clients/c-2.jpg" alt="client"--}}
{{--                                         class="mry-reviewer mry-mb-20 mry-fo">--}}
{{--                                    <h4 class="mry-mb-20 mry-fo">Paul Trueman</h4>--}}
{{--                                    <div class="mry-subtitle mry-mb-20 mry-fo">Creative director</div>--}}
{{--                                    <p class="mry-text mry-fo">We were very impressed with the progressive campaign--}}
{{--                                        and thought it spoke volumes to the reality of businesses. We have been--}}
{{--                                        working our way into the Toronto area for almost a year now and ready to--}}
{{--                                        gain--}}
{{--                                        some traction in that city.</p>--}}
{{--                                    <ul class="mry-star-rate mry-fo">--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li class="mry-empty"><i class="fas fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="swiper-slide">--}}

{{--                                <div class="mry-title-center">--}}
{{--                                    <img src="img/light/clients/c-3.jpg" alt="client"--}}
{{--                                         class="mry-reviewer mry-mb-20 mry-fo">--}}
{{--                                    <h4 class="mry-mb-20 mry-fo">Viktoria Freeman</h4>--}}
{{--                                    <div class="mry-subtitle mry-mb-20 mry-fo">Creative director</div>--}}
{{--                                    <p class="mry-text mry-fo">We were very impressed with the progressive campaign--}}
{{--                                        and thought it spoke volumes to the reality of businesses. We have been--}}
{{--                                        working our way into the Toronto area for almost a year now and ready to--}}
{{--                                        gain--}}
{{--                                        some traction in that city.</p>--}}
{{--                                    <ul class="mry-star-rate mry-fo">--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li><i class="fas fa-star"></i></li>--}}
{{--                                        <li class="mry-empty"><i class="fas fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- about end -->

    <!-- footer -->
    <footer class="mry-footer">
        <div class="container">
            <div class="mry-main-title mry-title-center mry-p-0-100">
                <div class="mry-subtitle mry-mb-20 mry-fo">Call to action</div>
                <h2 class="mry-h1 mry-mb-20 mry-fo">Do you have <span class="mry-border-text">a project?</span></h2>
                <div class="mry-text mry-mb-30  mry-fo">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    <br>Asperiores, cupiditate?
                </div>
                <div class="mry-fo">
                    <a href="contact.html" class="mry-anima-link mry-btn mry-btn-color mry-default-link">Let's
                        discuss</a>
                    <a href="portfolio-grid-1.html"
                       class="mry-anima-link  mry-btn-text mry-default-link">Portfolio</a>
                </div>
            </div>
        </div>
        <div class="mry-footer-copy">
            <div class="container">
                <div>Mireya © early 2021</div>
                <ul class="mry-social">
                    <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#."><i class="fab fa-behance"></i></a></li>
                    <li><a href="#."><i class="fab fa-dribbble"></i></a></li>
                </ul>
                <div>By: <a href="https://themeforest.net/user/ultimatewebsolutions/" class="mry-default-link"
                            target="_blank">UWS</a></div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <div class="mry-head-bg mry-head-bottom">
        <img src="img/light/projects/prjct-5/1.jpg" alt="background">
        <div class="mry-bg-overlay"></div>
    </div>

</div>

