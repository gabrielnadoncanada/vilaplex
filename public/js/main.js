(function() {

    'use strict';

    $(document).ready(function() {
        $('html').removeClass('is-animating');
    });


    var header = $('.top-panel'); // Select the header by its ID

    // portfolio filter
    $('.filter a').on('click', function() {
        $('.filter .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).data('filter');
        $('.masonry-grid').isotope({
            filter: selector,
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
            columnWidth: '.grid-sizer',
        },
    });

    // fancybox
    $('[data-fancybox="works"]').fancybox({
        animationEffect: 'zoom-in-out',
        animationDuration: 600,
        transitionDuration: 1000,
        buttons: [
            'zoom',
            'slideShow',
            'thumbs',
            'close',
        ],
    });

    $('[data-fancybox="works-slider"]').fancybox({
        animationEffect: 'zoom-in-out',
        animationDuration: 600,
        transitionDuration: 1000,
        buttons: [
            'zoom',
            'slideShow',
            'thumbs',
            'close',
        ],
    });

    $.fancybox.defaults.hash = false;

    if ($('html').hasClass('is-rendering')) {
        $('html, body').animate({
            scrollTop: 0,
        }, 0);
    }

    $('.anima-link').on('click', function() {
        $('.menu , .menu-btn-frame , .menu-btn').removeClass('active');
        $('.menu-item a').on('click', function() {
            $(this).toggleClass('active');
            $(this).children('.sub-menu').toggleClass('active');
        });
    });

    // cursor
    const element = document.querySelector('.ball');

    // scroll magic
    var controller = new ScrollMagic.Controller();

    var fadestyles = {
        opacity: '0',
        transform: 'translateY(50px) scale(.98)',
    };

    // $('.fo').css(fadestyles);
    //
    // var scrolAnimation1 = document.getElementsByClassName('fo');
    //
    // function createProjectScenes(object) {
    //     for (let i = 0; i < object.length; i++) {
    //         createScene(object[i], i);
    //     }
    // };
    //
    // function createScene(element, i) {
    //     var scene = new ScrollMagic.Scene({
    //         triggerElement: element,
    //         offset: -400,
    //     })
    //         .setTween(element, .6, {
    //             opacity: 1,
    //             scale: '1',
    //             y: 0,
    //         })
    //         .addTo(controller);
    // };
    //
    // createProjectScenes(scrolAnimation1);
    //
    //
    // var scrolAnimation3 = document.getElementsByClassName('curtain');
    //
    // function createProjectScenes3(object3) {
    //     for (let i = 0; i < object3.length; i++) {
    //         createScene3(object3[i], i);
    //     }
    // };
    //
    // function createScene3(element3, i) {
    //     var scene = new ScrollMagic.Scene({
    //         triggerElement: element3,
    //         offset: -200,
    //     })
    //         .setTween(element3, .8, {
    //             x: '-100%',
    //         })
    //         .addTo(controller);
    // }
    //
    // createProjectScenes3(scrolAnimation3);




})();
