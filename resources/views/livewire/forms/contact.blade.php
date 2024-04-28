<div>
    <x-form wire:submit.prevent="submit" id="form" class="mry-form mry-mb-100">
        <div class="row">
            <div class="col-lg-6">
                <x-form.label class="mry-label mry-fo"
                              for="firstName">{{__('app.contact.form.first_name')}}</x-form.label>
                <div class="mry-fo">
                    <x-form.input id="firstName" wire:model="firstName"
                                  placeholder="{{__('app.contact.form.first_name_placeholder')}}"
                                  class="mry-default-link" type="text"
                                  required></x-form.input>
                    <x-form.error for="firstName"></x-form.error>
                </div>
            </div>
            <div class="col-lg-6">
                <x-form.label class="mry-label mry-fo"
                              for="lastName">{{__('app.contact.form.last_name')}}</x-form.label>
                <div class="mry-fo">
                    <x-form.input id="lastName" wire:model="lastName"
                                  placeholder="{{__('app.contact.form.last_name_placeholder')}}"
                                  class="mry-default-link" type="text"
                                  required></x-form.input>
                    <x-form.error for="lastName"></x-form.error>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-form.label class="mry-label mry-fo" for="email">{{__('app.contact.form.email')}}</x-form.label>
                <div class="mry-fo">
                    <x-form.input id="email" wire:model="email"
                                  placeholder="{{__('app.contact.form.email_placeholder')}}"
                                  class="mry-default-link" type="email" required></x-form.input>
                    <x-form.error for="email"></x-form.error>
                </div>
            </div>
            <div class="col-lg-6">
                <x-form.label class="mry-label mry-fo" for="tel">{{__('app.contact.form.phone')}}</x-form.label>
                <div class="mry-fo">
                    <x-form.input id="tel" wire:model="tel"
                                  placeholder="{{__('app.contact.form.phone_placeholder')}}"
                                  class="mry-default-link" type="text"
                    ></x-form.input>
                    <x-form.error for="tel"></x-form.error>
                </div>
            </div>
        </div>
        <div class="mry-fade-object">
            <x-form.label class="mry-label mry-fo" for="message">{{__('app.contact.form.message')}}</x-form.label>
            <div class="mry-fo">
                <x-form.textarea id="message" wire:model="message" rows="8" cols="80"
                                 placeholder="{{__('app.contact.form.message_placeholder')}}"
                                 class="mry-default-link"
                                 type="text"
                                 required></x-form.textarea>
                <x-form.error for="message"></x-form.error>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="mry-fo mry-mx-auto row justify-content-center ">
                    <button type="submit"
                            class="mry-btn mry-default-link mry-mb-20">{{__('app.contact.form.send_message')}}</button>
                </div>
            </div>

        </div>
    </x-form>

</div>


