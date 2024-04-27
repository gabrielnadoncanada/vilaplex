<div class="container-fluid">
    <div class="container">
        <div class="mry-main-title mry-title-center mry-p-0-100">
            <div class="mry-subtitle mry-mb-20 mry-fo">{{ __('app.call_to_action.subtitle') }}</div>
            <h2 class="mry-h1 mry-mb-20 mry-fo">{{ __('app.call_to_action.title') }}
                <span class="mry-border-text">{{ __('app.call_to_action.second_title') }}</span>
            </h2>
            <div class="mry-text mry-mb-30  mry-fo">{{ __('app.call_to_action.description') }}
                <br>
            </div>
            <div class="mry-fo">
                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.contact')}}"
                   class="mry-anima-link mry-btn mry-btn-color mry-default-link">{{ __('app.call_to_action.action') }}</a>
            </div>
        </div>
    </div>
</div>

