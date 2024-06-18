<div class="container-fluid">
    <div class="container">
        <div class="main-title title-center p-0-100">
            <div class="subtitle mb-20 fo">{{ __('app.sections.call_to_action.subtitle') }}</div>
            <h2 class="h1 mb-20 fo">{{ __('app.sections.call_to_action.title') }}
                <span class="border-text">{{ __('app.sections.call_to_action.second_title') }}</span>
            </h2>
            <div class="text mb-30  fo">{{ __('app.sections.call_to_action.description') }}
                <br>
            </div>
            <div class="fo">
                <a href="{{LaravelLocalization::getURLFromRouteNameTranslated( App::currentLocale(), 'routes.contact')}}"
                   class="anima-link btn btn-color default-link">{{ __('app.sections.call_to_action.action') }}</a>
            </div>
        </div>
    </div>
</div>

