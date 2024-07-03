(function () {

    'use strict';

    $(document).ready(function () {
        $('html').removeClass('is-animating');
    });


    var header = $(".top-panel"); // Select the header by its ID

    // portfolio filter
    $('.filter a').on('click', function () {
        $('.filter .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).data('filter');
        $('.masonry-grid').isotope({
            filter: selector
        });
        return false;
    });

    // masonry grid
    $('.masonry-grid').isotope({
        filter: '*',
        itemSelector: '.masonry-grid-item',
        percentPosition: true,
        layoutMode: 'fitRows',
        masonry: {
            columnWidth: '.grid-sizer'
        }
    });

    // fancybox
    $('[data-fancybox="works"]').fancybox({
        animationEffect: "zoom-in-out",
        animationDuration: 600,
        transitionDuration: 1000,
        buttons: [
            "zoom",
            "slideShow",
            "thumbs",
            "close",
        ],
    });

    $('[data-fancybox="works-slider"]').fancybox({
        animationEffect: "zoom-in-out",
        animationDuration: 600,
        transitionDuration: 1000,
        buttons: [
            "zoom",
            "slideShow",
            "thumbs",
            "close",
        ],
    });

    $.fancybox.defaults.hash = false;

    if ($('html').hasClass('is-rendering')) {
        $("html, body").animate({
            scrollTop: 0
        }, 0);
    }

    $('.anima-link').on('click', function () {
        $('.menu , .menu-btn-frame , .menu-btn').removeClass('active');
        $('.menu-item a').on('click', function () {
            $(this).toggleClass('active');
            $(this).children('.sub-menu').toggleClass('active');
        });
    });

    // cursor
    const element = document.querySelector(".ball");
    const target = document.querySelector(".magnetic-link");
    const text = document.querySelector(".magnetic-object");



    // sliders
    var progressbar = $(".slider-progress-bar");

    var swiper = new Swiper(".slider-template-full-screen .swiper-container", {
        autoplay: {
            delay: 10000,
            disableOnInteraction: false
        },
        loop: true,
        parallax: true,
        mousewheel: true,
        mousewheel: {
            releaseOnEdges: true,
        },
        keyboard: true,
        speed: 1200,
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        pagination: {
            el: '.slider-pagination',
            clickable: true,
        },
        on: {
            init: function () {
                progressbar.removeClass("animate");
                progressbar.removeClass("active");
                progressbar.eq(0).addClass("animate");
                progressbar.eq(0).addClass("active");
            },
            slideChangeTransitionStart: function () {
                progressbar.removeClass("animate");
                progressbar.removeClass("active");
                progressbar.eq(0).addClass("active");
            },
            slideChangeTransitionEnd: function () {
                progressbar.eq(0).addClass("animate");
            }
        }
    });

    var swiper = new Swiper(".slider-template-horizontal-1  .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.button-team-next',
            prevEl: '.button-team-prev',
        },
        speed: 1200,
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
        },
    });

    var swiper = new Swiper(".slider-template-horizontal-2  .swiper-container", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: '.button-testimonials-next',
            prevEl: '.button-testimonials-prev',
        },
        speed: 1200,
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
        },
    });

    var swiper = new Swiper(".blog-slider", {
        slidesPerView: 3,
        spaceBetween: 60,
        loop: true,
        navigation: {
            nextEl: '.button-blog-next',
            prevEl: '.button-blog-prev',
        },
        speed: 1200,
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
        },
    });

    // scroll magic
    var controller = new ScrollMagic.Controller();

    var fadestyles = {
        opacity: "0",
        transform: 'translateY(50px) scale(.98)'
    };

    $('.fo').css(fadestyles);

    var scrolAnimation1 = document.getElementsByClassName('fo');

    function createProjectScenes(object) {
        for (let i = 0; i < object.length; i++) {
            createScene(object[i], i);
        }
    };

    function createScene(element, i) {
        var scene = new ScrollMagic.Scene({
            triggerElement: element,
            offset: -400,
        })
            .setTween(element, .6, {
                opacity: 1,
                scale: '1',
                y: 0
            })
            .addTo(controller)
    };

    createProjectScenes(scrolAnimation1);


    var scrolAnimation3 = document.getElementsByClassName('curtain');

    function createProjectScenes3(object3) {
        for (let i = 0; i < object3.length; i++) {
            createScene3(object3[i], i);
        }
    };

    function createScene3(element3, i) {
        var scene = new ScrollMagic.Scene({
            triggerElement: element3,
            offset: -200,
        })
            .setTween(element3, .8, {
                x: '-100%'
            })
            .addTo(controller)
    }

    createProjectScenes3(scrolAnimation3);

    // maps
    if ($("div").is("#map-dark")) {
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3Rvc2NhciIsImEiOiJja2VpbDE4b2UwbDg3MnNwY2d3YzlvcDV5In0.e26tLedpKwxrkOmPkWhQlg';
        var map = new mapboxgl.Map({
            container: 'map-dark',
            style: 'mapbox://styles/stoscar/ckk75h29r02ol17rrilp215vd',
            center: [-79.394900, 43.643102],
            zoom: 11
        });

        var marker = new mapboxgl.Marker()
            .setLngLat([-79.394900, 43.643102])
            .addTo(map);
    }

    if ($("div").is("#map-light")) {
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3Rvc2NhciIsImEiOiJja2VpbDE4b2UwbDg3MnNwY2d3YzlvcDV5In0.e26tLedpKwxrkOmPkWhQlg';
        var map = new mapboxgl.Map({
            container: 'map-light',
            style: 'mapbox://styles/stoscar/ckkb5d37l0euf17r0wws7op4i',
            center: [-79.394900, 43.643102],
            zoom: 11
        });

        var marker = new mapboxgl.Marker()
            .setLngLat([-79.394900, 43.643102])
            .addTo(map);
    }

    // map lock/unlock
    $(".lock").on('click', function () {
        $('.map').toggleClass('active');
        $('.lock').toggleClass('active');
        $('.lock .fas').toggleClass('fa-unlock');
    });

    // reinit
    document.addEventListener("swup:contentReplaced", function () {

        // parsely validation
        $('#form').parsley();

        // clear parsley empty elements
        if ($('#form').length > 0) {
            $('#form').parsley().on('field:success', function () {
                $('ul.parsley-errors-list').not(':has(li)').remove();
            });
        }

        $(document).ready(function () {

            var timeout = 1000
            $('html').addClass('is-animating');

            $(".loader").animate({
                width: "100%"
            }, timeout);

            setTimeout(function () {
                $('.preloader').removeClass('active');
            }, timeout);

            setTimeout(function () {
                $('html').removeClass('is-animating');
            }, timeout);

        });

        $('.scroll-hint').on('click', function () {
            scrollbar.scrollTo(0, 550, 1800);
        });

        window.oncontextmenu = function () {
            return false;
        }
        document.onkeydown = function (e) {
            if (window.event.keyCode == 123 || e.button == 2)
                return false;
        }

        // portfolio filter
        $('.filter a').on('click', function () {
            $('.filter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).data('filter');
            $('.masonry-grid').isotope({
                filter: selector
            });
            return false;
        });

        $('.masonry-grid').isotope({
            filter: '*',
            itemSelector: '.masonry-grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });

        $('[data-fancybox="works"]').fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 600,
            transitionDuration: 1000,
            buttons: [
                "zoom",
                "slideShow",
                "thumbs",
                "close",
            ],
        });

        $('[data-fancybox="works-slider"]').fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 600,
            transitionDuration: 1000,
            buttons: [
                "zoom",
                "slideShow",
                "thumbs",
                "close",
            ],
        });

        $.fancybox.defaults.hash = false;

        $('.smooth-scroll').on("click", function () {
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top - 0
            }, 1000);
            return false;
        });

        $('.menu-item').on('click', function () {
            $(this).toggleClass('active');
            $(this).children('.sub-menu').toggleClass('active');
        });

        $(document).on('click', function (e) {
            var el = '.menu , .menu-btn-frame , .menu-btn';
            if (jQuery(e.target).closest(el).length) return;
            $('.menu , .menu-btn-frame , .menu-btn').removeClass('active');
        });

        $('.anima-link').on('click', function () {
            $('.menu , .menu-btn-frame , .menu-btn').removeClass('active');
            $('.menu-item a').on('click', function () {
                $(this).toggleClass('active');
                $(this).children('.sub-menu').toggleClass('active');
            });
        });

        if ($('html').hasClass('is-rendering')) {
            $("html, body").animate({
                scrollTop: 0
            }, 0);
        }

        $(".default-link").mouseenter(function (e) {
            TweenMax.to(element, 0.3, {
                scale: .6,
            });
            TweenMax.to(element, 0.3, {
                opacity: '1'
            });
        });

        $(".default-link").mouseleave(function (e) {
            TweenMax.to(element, 0.3, {
                scale: 1
            });
            TweenMax.to(element, 0.3, {
                opacity: '.5'
            });
        });

        $(".magnetic-link").mouseenter(function (e) {
            TweenMax.to(element, 0.3, {
                scale: 1.4,
            });
            TweenMax.to(element, 0.3, {
                opacity: '1'
            });
        });

        $(".magnetic-link").mouseleave(function (e) {
            TweenMax.to(element, 0.3, {
                scale: 1
            });
            TweenMax.to(element, 0.3, {
                opacity: '.5'
            });
        });

        var progressbar = $(".slider-progress-bar");

        var swiper = new Swiper(".main-slider", {
            autoplay: {
                delay: 10000,
                disableOnInteraction: false
            },
            spaceBetween: 0,
            loop: true,
            parallax: true,
            mousewheel: true,
            mousewheel: {
                releaseOnEdges: true,
            },
            keyboard: true,
            speed: 1200,
            navigation: {
                nextEl: '.button-next',
                prevEl: '.button-prev',
            },
            pagination: {
                el: '.slider-pagination',
                clickable: true,
            },
            on: {
                init: function () {
                    progressbar.removeClass("animate");
                    progressbar.removeClass("active");
                    progressbar.eq(0).addClass("animate");
                    progressbar.eq(0).addClass("active");
                },
                slideChangeTransitionStart: function () {
                    progressbar.removeClass("animate");
                    progressbar.removeClass("active");
                    progressbar.eq(0).addClass("active");
                },
                slideChangeTransitionEnd: function () {
                    progressbar.eq(0).addClass("animate");
                }
            }
        });

        var swiper = new Swiper(".team-slider", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.button-team-next',
                prevEl: '.button-team-prev',
            },
            speed: 1200,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
            },
        });

        var swiper = new Swiper(".testimonials-slider", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.button-testimonials-next',
                prevEl: '.button-testimonials-prev',
            },
            speed: 1200,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                },
            },
        });

        var swiper = new Swiper(".blog-slider", {
            slidesPerView: 3,
            spaceBetween: 60,
            loop: true,
            navigation: {
                nextEl: '.button-blog-next',
                prevEl: '.button-blog-prev',
            },
            speed: 1200,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                },
            },
        });

        var fadestyles = {
            opacity: "0",
            transform: 'translateY(50px)'
        };

        $('.fo').css(fadestyles);

        var scrolAnimation1 = document.getElementsByClassName('fo');

        function createProjectScenes(object) {
            for (let i = 0; i < object.length; i++) {
                createScene(object[i], i);
            }
        };

        function createScene(element, i) {
            var scene = new ScrollMagic.Scene({
                triggerElement: element,
                offset: -360,
            })
                .setTween(element, .6, {
                    opacity: 1,
                    y: 0
                })
                .addTo(controller)
        };

        createProjectScenes(scrolAnimation1);

        var scrolAnimation2 = document.getElementsByClassName('scale-object');

        function createProjectScenes2(object2) {
            for (let i = 0; i < object2.length; i++) {
                createScene2(object2[i], i);
            }
        };

        function createScene2(element2, i) {
            var scene = new ScrollMagic.Scene({
                triggerElement: element2,
                duration: 1800,
                offset: -350,
            })
                .setTween(element2, .6, {
                    scale: '1.2',
                    y: '10%'
                })
                .addTo(controller)
        }

        createProjectScenes2(scrolAnimation2);

        var scrolAnimation3 = document.getElementsByClassName('curtain');

        function createProjectScenes3(object3) {
            for (let i = 0; i < object3.length; i++) {
                createScene3(object3[i], i);
            }
        };

        function createScene3(element3, i) {
            var scene = new ScrollMagic.Scene({
                triggerElement: element3,
                offset: -150,
            })
                .setTween(element3, .8, {
                    x: '-100%'
                })
                .addTo(controller)
        }

        createProjectScenes3(scrolAnimation3);

        if ($("div").is("#map-dark")) {
            mapboxgl.accessToken = 'pk.eyJ1Ijoic3Rvc2NhciIsImEiOiJja2VpbDE4b2UwbDg3MnNwY2d3YzlvcDV5In0.e26tLedpKwxrkOmPkWhQlg';
            var map = new mapboxgl.Map({
                container: 'map-dark',
                style: 'mapbox://styles/stoscar/ckk75h29r02ol17rrilp215vd',
                center: [-79.394900, 43.643102],
                zoom: 11
            });

            var marker = new mapboxgl.Marker()
                .setLngLat([-79.394900, 43.643102])
                .addTo(map);
        }

        if ($("div").is("#map-light")) {
            mapboxgl.accessToken = 'pk.eyJ1Ijoic3Rvc2NhciIsImEiOiJja2VpbDE4b2UwbDg3MnNwY2d3YzlvcDV5In0.e26tLedpKwxrkOmPkWhQlg';
            var map = new mapboxgl.Map({
                container: 'map-light',
                style: 'mapbox://styles/stoscar/ckkb5d37l0euf17r0wws7op4i',
                center: [-79.394900, 43.643102],
                zoom: 11
            });

            var marker = new mapboxgl.Marker()
                .setLngLat([-79.394900, 43.643102])
                .addTo(map);
        }

        // map lock/unlock
        $(".lock").on('click', function () {
            $('.map').toggleClass('active');
            $('.lock').toggleClass('active');
            $('.lock .fas').toggleClass('fa-unlock');
        });

    });

})()
