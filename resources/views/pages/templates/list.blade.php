<div class="mry-portfolio mry-p-100-100" id="mry-anchor">
    <div class="container">
        <div class="mry-portfolio-frame">
            <div class="mry-masonry-grid mry-3-col">
                <div class="mry-grid-sizer"></div>

                @foreach($record->items as $item)
                    <div class="mry-masonry-grid-item mry-masonry-grid-item-33 interior">
                        <div class="mry-card-item mry-fo">
                            <div class="mry-card-cover-frame mry-mb-20">
                                <div class="mry-badge">{{date('d.m.Y',strtotime($item->created_at))}}</div>
                                <img src="{{ Storage::url($item->featured_image)}}" alt="project">
                                <div class="mry-cover-overlay"></div>
                                <div class="mry-hover-links">
                                    <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.post', array('record' => $item->slug))}}"
                                       class="mry-more mry-magnetic-link mry-anima-link"><span
                                            class="mry-magnetic-object"><i class="fas fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                            <div class="mry-item-descr">
                                <h4 class="mry-mb-10 mry-fo"><a
                                        href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.post', array('record' => $item->slug))}}">{{$item->title}}</a>
                                </h4>
                                <div class="mry-text mry-mb-10 mry-fo">{{$item->excerpt}}
                                </div>
                                <div class="mry-fo"><a
                                        href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.post', array('record' => $item->slug))}}"
                                        class="mry-link mry-default-link">En
                                        savoir plus
                                    </a></div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

{{--        <ul class="mry-pagination mry-fo">--}}
{{--            <li class="mry-active"><a href="#." class="mry-default-link"><span>1</span></a></li>--}}
{{--            <li><a href="#." class="mry-default-link"><span>2</span></a></li>--}}
{{--            <li><a href="#." class="mry-default-link"><span>3</span></a></li>--}}
{{--            <li><a href="#." class="mry-default-link"><span>4</span></a></li>--}}
{{--            <li><a href="#." class="mry-default-link"><span>5</span></a></li>--}}
{{--        </ul>--}}

    </div>
</div>
