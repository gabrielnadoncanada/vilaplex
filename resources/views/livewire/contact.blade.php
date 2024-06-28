<div>
    <x-form wire:submit.prevent="submit" id="form" class="form mb-[100px]">
        <div class="flex">
            <div class="col-lg-6">
                <x-form.label class="label fo"
                              for="firstName">{{__('app.contact.form.first_name')}}</x-form.label>
                <div class="fo">
                    <x-form.input id="firstName" wire:model="firstName"
                                  placeholder="{{__('app.contact.form.first_name_placeholder')}}"
                                  class="default-link" type="text"
                                  required></x-form.input>
                    <x-form.error for="firstName"></x-form.error>
                </div>
            </div>
            <div class="col-lg-6">
                <x-form.label class="label fo"
                              for="lastName">{{__('app.contact.form.last_name')}}</x-form.label>
                <div class="fo">
                    <x-form.input id="lastName" wire:model="lastName"
                                  placeholder="{{__('app.contact.form.last_name_placeholder')}}"
                                  class="default-link" type="text"
                                  required></x-form.input>
                    <x-form.error for="lastName"></x-form.error>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="col-lg-6">
                <x-form.label class="label fo" for="email">{{__('app.contact.form.email')}}</x-form.label>
                <div class="fo">
                    <x-form.input id="email" wire:model="email"
                                  placeholder="{{__('app.contact.form.email_placeholder')}}"
                                  class="default-link" type="email" required></x-form.input>
                    <x-form.error for="email"></x-form.error>
                </div>
            </div>
            <div class="col-lg-6">
                <x-form.label class="label fo" for="tel">{{__('app.contact.form.phone')}}</x-form.label>
                <div class="fo">
                    <x-form.input id="tel" wire:model="tel"
                                  placeholder="{{__('app.contact.form.phone_placeholder')}}"
                                  class="default-link" type="text"
                    ></x-form.input>
                    <x-form.error for="tel"></x-form.error>
                </div>
            </div>
        </div>
        <div class="fade-object">
            <x-form.label class="label fo" for="message">{{__('app.contact.form.message')}}</x-form.label>
            <div class="fo">
                <x-form.textarea id="message" wire:model="message" flexs="8" cols="80"
                                 placeholder="{{__('app.contact.form.message_placeholder')}}"
                                 class="default-link"
                                 type="text"
                                 required></x-form.textarea>
                <x-form.error for="message"></x-form.error>
            </div>
        </div>
        <div class="flex align-items-center">
            <div class="col-lg-12">
                <div class="fo mx-auto flex justify-center ">
                    <button type="submit"
                            class="btn default-link mb-[20px]">{{__('app.contact.form.send_message')}}</button>
                </div>
            </div>

        </div>
    </x-form>
</div>


