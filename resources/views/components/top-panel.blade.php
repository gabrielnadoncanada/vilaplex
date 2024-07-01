<div class="top-panel">
    <div class="logo-frame">
        <a href="/" class="default-link anima-link">
            @if(app(App\Settings\ThemeSettings::class)->site_logo)
                <img class="logo" src="{{Storage::url(app(App\Settings\ThemeSettings::class)->site_logo)}}"
                     alt="Mireya">
            @endif
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
