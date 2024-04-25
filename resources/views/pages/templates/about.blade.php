<div class="mry-about mry-p-100-100">
    <div class="container">
        <div class="row justify-content-center">
            <x-builder :blocks="$record->content"></x-builder>
            <div class="col-lg-8">

                <div class="mry-numbering mry-fo">
                    <div class="mry-border-text">03</div>
                    <div class="mry-subtitle">Services</div>
                </div>

                <div class="row justify-content-center">
                    @foreach (App\Models\Service::published()->get() as $index => $service)
                        <div class="col-lg-6">
                            <div class="mry-text-center mry-mb-100">
                                <h4 class="mry-mb-20 mry-fo mry-h4">{{$service->title}}</h4>
                                <p class="mry-text mry-mb-20 mry-fo">{{$service->excerpt}}</p>
                                <div class="mry-fo">
                                    <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.service', array('record' => $service->slug))}}"
                                       class="mry-link mry-default-link">En savoir plus</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<x-sections.call-to-action/>
<x-sections.footer/>
