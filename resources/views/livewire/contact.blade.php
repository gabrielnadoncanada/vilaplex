<div class="mry-content-frame" id="scroll">
    <x-sections.page-header
        :subtitle="__('app.contact.subtitle')"
        :title="__('app.contact.title')"
        :description="__('app.contact.description')"
        image="img/light/projects/prjct-6/1.jpg"/>

    <div class="mry-about mry-p-100-0">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mry-mb-100 mry-text-center">
                                    <div class="mry-numbering mry-fo">
                                        <div class="mry-border-text">01</div>
                                        <div class="mry-subtitle">{{__('app.contact.location')}}</div>
                                    </div>
                                    <div class="mry-fade-object mry-mb-100">
                                        <h4 class="mry-h4 mry-mb-20 mry-fo">{{__('app.contact.welcome_to_visit')}}</h4>
                                        <p class="mry-text mry-mb-20 mry-fo">
                                            {{App\Models\DynamicConfig::getConfig('country')}},
                                            {{App\Models\DynamicConfig::getConfig('city')}}<br>
                                            {{App\Models\DynamicConfig::getConfig('address_line_1')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mry-mb-100 mry-text-center">
                                    <div class="mry-numbering mry-fo">
                                        <div class="mry-border-text">02</div>
                                        <div class="mry-subtitle">{{__('app.contact.contact')}}</div>
                                    </div>
                                    <div class="mry-fade-object mry-mb-100">
                                        <h4 class="mry-h4 mry-mb-20 mry-fo">{{__('app.contact.shall_we_talk')}}</h4>
                                        <p class="mry-text mry-fo">Email: <a
                                                href="mailto:{{App\Models\DynamicConfig::getConfig('email')}}">
                                                {{App\Models\DynamicConfig::getConfig('email')}}
                                            </a>
                                            <br>Phone: <a href="tel:{{App\Models\DynamicConfig::getConfig('phone')}}">
                                                {{App\Models\DynamicConfig::getConfig('phone')}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mry-main-title mry-title-center mry-p-0-40">
                            <div class="mry-numbering mry-fo">
                                <div class="mry-border-text">03</div>
                                <div class="mry-subtitle">{{__('app.contact.contact_form')}}</div>
                            </div>
                            <h2 class="mry-fo mry-h2">{{__('app.contact.write_us_a_message')}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <livewire:forms.contact></livewire:forms.contact>

                    </div>
                    {{--                <div class="col-lg-12">--}}
                    {{--                    <div class="mry-main-title mry-title-center mry-p-0-40">--}}
                    {{--                        <div class="mry-numbering mry-fo">--}}
                    {{--                            <div class="mry-border-text">04</div>--}}
                    {{--                            <div class="mry-subtitle">{{__('app.contact.map')}}</div>--}}
                    {{--                        </div>--}}
                    {{--                        <h2 class="mry-fo">{{__('app.contact.welcome_to_visit')}}</h2>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-lg-10">--}}
                    {{--                    <div class="mry-map-frame mry-mb-100mry-fo">--}}
                    {{--                        <div id='map-light' class="mry-map mry-map-light"></div>--}}
                    {{--                        <div class="mry-lock mry-magnetic-link"><i class="fas fa-lock mry-magnetic-object"></i></div>--}}
                    {{--                        <div class="mry-curtain"></div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>

        </div>
    </div>
    <x-sections.footer/>
</div>
