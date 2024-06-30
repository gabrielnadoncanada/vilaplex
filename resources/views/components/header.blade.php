<!-- cursor -->

<div class="magic-cursor">
    <div class="ball">
        <div class="loader">
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

<header>


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
    <div class="menu">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <nav id="dynamic-menu">
                        @php
                            $menu =  App\Models\Navigation::find(app(App\Settings\ThemeSettings::class)->header_menu_id);
                        @endphp
                        @if($menu)
                            <x-menu :items="$menu->items"/>
                        @endif
                    </nav>
                </div>
                <div class="col-md-4">
                    <div class="info-box-frame">
                        <div class="info-box">
                            @if(theme('site_country'))
                                <div class="mb-20">
                                    <div class="label mb-1">Country:</div>
                                    <div class="text">{{theme('site_country')}}</div>
                                </div>
                            @endif
                            @if(theme('site_city'))
                                <div class="mb-20">
                                    <div class="label mb-1">City:</div>
                                    <div class="text">{{theme('site_city')}}</div>
                                </div>
                            @endif
                            @if(theme('site_address'))
                                <div class="mb-20">
                                    <div class="label mb-1">Address:</div>
                                    <div class="text">{{theme('site_address')}}</div>
                                </div>
                            @endif
                            @if(theme('site_email'))
                                <div class="mb-20">
                                    <div class="label mb-1">Email:</div>
                                    <a class="text" href="mailto:{{theme('site_email')}}">
                                        {{theme('site_email')}}
                                    </a>
                                </div>
                            @endif
                            @if(theme('site_phone'))
                                <div class="mb-20">
                                    <div class="label mb-1">Phone:</div>
                                    <a class="text" href="tel:{{theme('site_phone')}}">
                                        {{theme('site_phone')}}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


