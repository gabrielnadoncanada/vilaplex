<header>
    <div class="top-panel">
        <div class="logo-frame">
            <a href="{{route('home')}}" class="default-link anima-link">
                <img class="logo" src="{{App\Models\DynamicConfig::getConfig('logo_dark')}}" alt="Mireya">
            </a>
        </div>
        <div class="menu-button-frame">
            <div class="menu-btn magnetic-link">
                <div class="burger magnetic-object">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <nav id="dynamic-menu">
                        <ul>
                            {{--                        @foreach(App\Models\Page::published()->get() as $record)--}}
                            {{--                            <li class="menu-item">--}}
                            {{--                                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.page', array('record' => $record->slug)) }}"--}}
                            {{--                                   class="anima-link default-link">{{$record->title}}</a>--}}
                            {{--                        @endforeach--}}
                            <li class="menu-item">
                                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.about')}}"
                                   class="anima-link default-link">À propos</a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#"
                                   class="default-link">Services</a>
                                <ul class="sub-menu">
                                    @foreach (App\Models\Service::published()->get() as $record)
                                        <li class="menu-item">
                                            <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.service', array('record' => $record->slug))}}"
                                               class="anima-link default-link">{{$record->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.posts')}}"
                                   class="anima-link default-link">Blogue</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.contact')}}"
                                   class="anima-link default-link">Contact</a>
                            </li>
                            {{--                        <li class="menu-item menu-item-has-children">--}}
                            {{--                            <a href="#."--}}
                            {{--                               class="default-link">Blog</a>--}}
                            {{--                            <ul class="sub-menu">--}}
                            {{--                                <li class="menu-item">--}}
                            {{--                                    <a href="blog.html"--}}
                            {{--                                       class="anima-link default-link">Blog list</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="menu-item">--}}
                            {{--                                    <a href="publication.html"--}}
                            {{--                                       class="anima-link default-link">Publication</a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            {{--                        </li>--}}
                        </ul>
                    </nav>

                </div>
                <div class="col-md-4">
                    <div class="info-box-frame">
                        <div class="info-box">
                            <div class="mb-20">
                                <div class="label mb-1">Country:</div>
                                <div class="text">{{App\Models\DynamicConfig::getConfig('country')}}</div>
                            </div>
                            <div class="mb-20">
                                <div class="label mb-1">City:</div>
                                <div class="text">{{App\Models\DynamicConfig::getConfig('city')}}</div>
                            </div>
                            <div class="mb-20">
                                <div class="label mb-1">Address:</div>
                                <div class="text">{{App\Models\DynamicConfig::getConfig('address_line_1')}}</div>
                            </div>
                            <div class="mb-20">
                                <div class="label mb-1">Email:</div>
                                <a class="text"
                                   href="mailto:{{App\Models\DynamicConfig::getConfig('email')}}">
                                    {{App\Models\DynamicConfig::getConfig('email')}}
                                </a>
                            </div>
                            <div class="mb-20">
                                <div class="label mb-1">Phone:</div>
                                <a class="text" href="tel:{{App\Models\DynamicConfig::getConfig('phone')}}">
                                    {{App\Models\DynamicConfig::getConfig('phone')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


