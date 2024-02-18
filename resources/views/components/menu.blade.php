<!-- top panel -->
<div class="mry-top-panel">
    <div class="mry-logo-frame">
        <a href="{{route('home')}}" class="mry-default-link mry-anima-link">
            <img class="mry-logo" src="{{asset('svg/light/logo.svg')}}" alt="Mireya">
        </a>
    </div>
    <div class="mry-menu-button-frame">
        <div class="mry-label">Menu</div>

        <div class="mry-menu-btn mry-magnetic-link">
            <div class="mry-burger mry-magnetic-object">
                <span></span>
            </div>
        </div>
    </div>
</div>
<!-- top panel end -->

<!-- menu -->
<div class="mry-menu">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <nav id="mry-dynamic-menu">
                    <ul>
                        <li class="menu-item">
                            <a href="about.html"
                               class="mry-anima-link mry-default-link">About</a></li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#."
                               class="mry-default-link">Services</a>
                            <ul class="sub-menu">
                                @foreach (App\Models\Service::all() as $index => $service)
                                    <li class="menu-item">
                                        <a href="{{route('service.show', $service->id)}}"
                                           class="mry-anima-link mry-default-link">{{$service->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('contact')}}"
                               class="mry-anima-link mry-default-link">Contact</a>
                        </li>
                        {{--                        <li class="menu-item menu-item-has-children">--}}
                        {{--                            <a href="#."--}}
                        {{--                               class="mry-default-link">Blog</a>--}}
                        {{--                            <ul class="sub-menu">--}}
                        {{--                                <li class="menu-item">--}}
                        {{--                                    <a href="blog.html"--}}
                        {{--                                       class="mry-anima-link mry-default-link">Blog list</a>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="menu-item">--}}
                        {{--                                    <a href="publication.html"--}}
                        {{--                                       class="mry-anima-link mry-default-link">Publication</a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                    </ul>
                </nav>

            </div>
            <div class="col-md-4">
                <div class="mry-info-box-frame">
                    <div class="mry-info-box">
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Country:</div>
                            <div class="mry-text">Canada</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">City:</div>
                            <div class="mry-text">Toronto</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Adress:</div>
                            <div class="mry-text">HTGS 4456 North Av.</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Email:</div>
                            <a class="mry-text" href="mailto:mireya.inbox@mail.com">mireya.inbox@mail.com</a>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Phone:</div>
                            <a class="mry-text" href="#.">+4 9(054) 996 84 25</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- menu end -->
