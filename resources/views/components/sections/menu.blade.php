<div class="mry-menu">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <nav id="mry-dynamic-menu">
                    <ul>
{{--                        @foreach(App\Models\Page::published()->get() as $record)--}}
{{--                            <li class="menu-item">--}}
{{--                                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.page', array('record' => $record->slug)) }}"--}}
{{--                                   class="mry-anima-link mry-default-link">{{$record->title}}</a>--}}
{{--                        @endforeach--}}
                        <li class="menu-item">
                            <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.about')}}"
                               class="mry-anima-link mry-default-link">À propos</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#"
                               class="mry-default-link">Services</a>
                            <ul class="sub-menu">
                                @foreach (App\Models\Service::published()->get() as $record)
                                    <li class="menu-item">
                                        <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.service', array('record' => $record->slug))}}"
                                           class="mry-anima-link mry-default-link">{{$record->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.contact')}}"
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
                            <div class="mry-text">{{App\Models\DynamicConfig::getConfig('country')}}</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">City:</div>
                            <div class="mry-text">{{App\Models\DynamicConfig::getConfig('city')}}</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Address:</div>
                            <div class="mry-text">{{App\Models\DynamicConfig::getConfig('address_line_1')}}</div>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Email:</div>
                            <a class="mry-text"
                               href="mailto:{{App\Models\DynamicConfig::getConfig('email')}}">
                                {{App\Models\DynamicConfig::getConfig('email')}}
                            </a>
                        </div>
                        <div class="mry-mb-20">
                            <div class="mry-label mry-mb-5">Phone:</div>
                            <a class="mry-text" href="tel:{{App\Models\DynamicConfig::getConfig('phone')}}">
                                {{App\Models\DynamicConfig::getConfig('phone')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
