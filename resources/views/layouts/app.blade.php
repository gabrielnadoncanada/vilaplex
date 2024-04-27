<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="is-animating">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("css/plugins/bootstrap.min.css")}}">
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{asset("css/plugins/font-awesome.min.css")}}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{asset("css/plugins/swiper.min.css")}}">
    <!-- fancybox css -->
    <link rel="stylesheet" href="{{asset("css/plugins/fancybox.min.css")}}">
    <!-- mapbox css -->
    <link href="{{asset("css/plugins/mapbox-style.css")}}" rel='stylesheet'>
    <!-- main css -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $meta ?? '' }}
</head>
<body class="{{Route::getCurrentRoute()->getName()}}">
<div class="mry-app">
    <!-- cursor -->
    <div class="mry-magic-cursor">
        <div class="mry-ball">
            <div class="mry-loader">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50"
                     style="enable-background:new 0 0 50 50;" xml:space="preserve">
						<path
                            d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25"
                                              to="360 25 25" dur="0.6s" repeatCount="indefinite"/>
                        </path>
					</svg>
            </div>
        </div>
    </div>
    <x-sections.top-panel/>
    <x-sections.menu/>
    <div class="transition-fade">
        {{ $slot }}
    </div>
</div>

@stack('scripts')

<!-- jquery js -->
<script src="{{asset("js/plugins/jquery.min.js")}}"></script>
<!-- tween max js -->
<script src="{{asset("js/plugins/tween-max.min.js")}}"></script>
<!-- scroll magic js -->
<script src="{{asset("js/plugins/scroll-magic.js")}}"></script>
<!-- scroll magic gsap plugin js -->
<script src="{{asset("js/plugins/scroll-magic-gsap-plugin.js")}}"></script>
<!-- swiper js -->
<script src="{{asset("js/plugins/swiper.min.js")}}"></script>
<!-- isotope js -->
<script src="{{asset("js/plugins/isotope.min.js")}}"></script>
<!-- fancybox js -->
<script src="{{asset("js/plugins/fancybox.min.js")}}"></script>
<!-- mapbox js -->
<script src="{{asset("js/plugins/mapbox.min.js")}}"></script>
<!-- smooth scrollbar js -->
<script src="{{asset("js/plugins/smooth-scrollbar.min.js")}}"></script>
<!-- overscroll js -->
<script src="{{asset("js/plugins/overscroll.min.js")}}"></script>
<!-- canvas js -->
<script src="{{asset("js/plugins/canvas.js")}}"></script>
<!-- parsley js -->
<script src="{{asset("js/plugins/parsley.min.js")}}"></script>
<!-- main js -->
<script src="{{asset("js/main.js")}}"></script>

</body>
</html>
