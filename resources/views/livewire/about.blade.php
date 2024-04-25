<div class="mry-content-frame" id="scroll">

    <x-sections.page-header
        :subtitle="__('app.service.subtitle')"
        :title="$record->title"
        :description="$record->excerpt"
        :image="Storage::url($record->featured_image)"/>

    @include('pages.templates.about', ['record' => $record])

</div>



{{--"id" => 1--}}
{{--"title" => "{"fr":"Gestion financi\u00e8re","en":"Financial management"}"--}}
{{--"slug" => "{"fr":"gestion-financiere","en":"financial-management"}"--}}
{{--"content" => "--}}
{{--{"fr": [{"data": {"title": "Who we are", "content": [{"data": {"content": "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit, velit e--}}
{{--    ▶--}}
{{--    "--}}
{{--    "excerpt" => "--}}
{{--    {"fr":"Supervision des finances de vos propri\u00e9t\u00e9s, incluant facturation, loyers, et optimisation des rendements immobiliers.","en":"Supervision of the finances of your properties, including invoicing, rents, and optimization of real estate returns."}--}}
{{--    ◀--}}
{{--    "--}}
{{--    "status" => "published"--}}
{{--    "featured_image" => ""categories\/featured_images\/Cdy1c6BPte8G245VcopwQewod57lpKqa1z24yJbO.webp""--}}
{{--    "created_at" => "2024-04-01 20:37:05"--}}
{{--    "updated_at" => "2024-04-01 21:09:04"--}}
{{--<div class="mry-content-frame" id="scroll">--}}
{{--    @include('pages.templates.default', ['record' => $record])--}}

{{--    @php--}}
{{--        $this->sectionCount = 0;--}}
{{--    @endphp--}}
{{--    <x-sections.page-header--}}
{{--        :subtitle="__('app.contact.subtitle')"--}}
{{--        :title="__('app.contact.title')"--}}
{{--        :description="__('app.contact.description')"--}}
{{--        image="img/light/projects/prjct-6/1.jpg"/>--}}

{{--    <x-builder :blocks="App\Models\DynamicConfig::getConfig('about_us_section1')"></x-builder>--}}

{{--    <div class="mry-about mry-p-100-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="mry-mb-100 mry-text-center">--}}
{{--                                <div class="mry-numbering mry-fo">--}}
{{--                                    <div class="mry-border-text">01</div>--}}
{{--                                    <div class="mry-subtitle">{{__('app.contact.location')}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="mry-fade-object mry-mb-100">--}}
{{--                                    <h4 class="mry-mb-20 mry-fo">{{__('app.contact.welcome_to_visit')}}</h4>--}}
{{--                                    <p class="mry-text mry-mb-20 mry-fo">--}}
{{--                                        {{App\Models\DynamicConfig::getConfig('country')}},--}}
{{--                                        {{App\Models\DynamicConfig::getConfig('city')}}<br>--}}
{{--                                        {{App\Models\DynamicConfig::getConfig('address_line_1')}}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="mry-mb-100 mry-text-center">--}}
{{--                                <div class="mry-numbering mry-fo">--}}
{{--                                    <div class="mry-border-text">02</div>--}}
{{--                                    <div class="mry-subtitle">{{__('app.contact.contact')}}</div>--}}
{{--                                </div>--}}
{{--                                <div class="mry-fade-object mry-mb-100">--}}
{{--                                    <h4 class="mry-mb-20 mry-fo">{{__('app.contact.shall_we_talk')}}</h4>--}}
{{--                                    <p class="mry-text mry-fo">Email: <a--}}
{{--                                            href="mailto:{{App\Models\DynamicConfig::getConfig('email')}}">--}}
{{--                                            {{App\Models\DynamicConfig::getConfig('email')}}--}}
{{--                                        </a>--}}
{{--                                        <br>Phone: <a href="tel:{{App\Models\DynamicConfig::getConfig('phone')}}">--}}
{{--                                            {{App\Models\DynamicConfig::getConfig('phone')}}--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="mry-main-title mry-title-center mry-p-0-40">--}}
{{--                        <div class="mry-numbering mry-fo">--}}
{{--                            <div class="mry-border-text">03</div>--}}
{{--                            <div class="mry-subtitle">{{__('app.contact.contact_form')}}</div>--}}
{{--                        </div>--}}
{{--                        <h2 class="mry-fo">{{__('app.contact.write_us_a_message')}}</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-8">--}}
{{--                    <form method="POST" id="form" class="mry-form mry-mb-100" action="send.php">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label class="mry-label mry-fo" for="firstName">{{__('app.contact.form.first_name')}}</label>--}}
{{--                                <div class="mry-fo">--}}
{{--                                    <input id="firstName" name="firstName" placeholder="{{__('app.contact.form.first_name_placeholder')}}"--}}
{{--                                           class="mry-default-link" type="text"--}}
{{--                                           data-parsley-pattern="^[a-zA-Z\s.]+$" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label class="mry-label mry-fo" for="lastName">{{__('app.contact.form.last_name')}}</label>--}}
{{--                                <div class="mry-fo">--}}
{{--                                    <input id="lastName" name="lastName" placeholder="{{__('app.contact.form.last_name_placeholder')}}"--}}
{{--                                           class="mry-default-link" type="text"--}}
{{--                                           data-parsley-pattern="^[a-zA-Z\s.]+$" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label class="mry-label mry-fo" for="email">{{__('app.contact.form.email')}}</label>--}}
{{--                                <div class="mry-fo">--}}
{{--                                    <input id="email" name="email" placeholder="{{__('app.contact.form.email_placeholder')}}"--}}
{{--                                           class="mry-default-link" type="email" required></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <label class="mry-label mry-fo" for="phone">{{__('app.contact.form.phone')}}</label>--}}
{{--                                <div class="mry-fo">--}}
{{--                                    <input id="phone" name="phone" placeholder="{{__('app.contact.form.phone_placeholder')}}"--}}
{{--                                           class="mry-default-link" type="text"--}}
{{--                                           data-parsley-pattern="^\+{1}[0-9]+$"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mry-fade-object">--}}
{{--                            <label class="mry-label mry-fo" for="message">{{__('app.contact.form.message')}}</label>--}}
{{--                            <div class="mry-fo">--}}
{{--                                <textarea id="message" name="message" rows="8" cols="80"--}}
{{--                                          placeholder="{{__('app.contact.form.message_placeholder')}}" class="mry-default-link"--}}
{{--                                          type="text"--}}
{{--                                          data-parsley-pattern="^[a-zA-Z0-9\s.:,!?']+$" required></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="mry-fo mry-mx-auto row justify-content-center ">--}}
{{--                                    <button type="submit" class="mry-btn mry-default-link mry-mb-20">{{__('app.contact.form.send_message')}}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
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
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <x-sections.footer/>--}}
{{--</div>--}}
