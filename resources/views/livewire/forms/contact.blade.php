<div class="container">
    <div class="mx-auto lg:w-2/3">
        <form id="form" class="form mb-[100px]" wire:submit.prevent="submit">
            <div class="grid md:grid-cols-2  gap-x-6 md:gap-y-5">
                <div >
                    <label class="label " for="firstName">Prénom</label>
                    <div>
                        <input id="firstName" name="firstName" wire:model="firstName" placeholder="John"
                               class="default-link" type="text" required>
                        @error('firstName')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="label" for="lastName">Nom</label>
                    <div>
                        <input id="lastName" name="lastName" wire:model="lastName" placeholder="Doe" class="default-link"
                               type="text" required>
                        @error('lastName')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2  gap-x-6 md:gap-y-5">
                <div>
                    <label class="label " for="email">Email</label>
                    <div class="">
                        <input id="email" wire:model="email" name="email" placeholder="votre.email@exemple.com"
                               class="default-link" type="email" required>
                    </div>
                    @error('email')
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $message }} </li>
                    </ul>
                    @enderror
                </div>
                <div>
                    <label class="label " for="phone">Téléphone</label>
                    <div class="">
                        <input id="phone" wire:model="tel" name="phone" placeholder="+0 (000) 000 00 00"
                               class="default-link" type="text">
                        @error('tel')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required">{{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="fade-object">
                <label class="label" for="message">Message</label>
                <div class="">
                <textarea id="message" wire:model="message" name="message" rows="8" cols="80"
                          placeholder="Tapez votre message ici" class="default-link" type="text" required></textarea>
                    @error('message')
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $message }} </li>
                    </ul>
                    @enderror
                </div>
            </div>

            <div class="grid lg:grid-cols-12   gap-x-6 gap-y-5 items-center">
                <div class="md:col-span-6 lg:col-span-6">
                    <div>
                        <button type="submit" class="btn default-link">Envoyer le message</button>
                    </div>
                </div>
                <div class="md:col-span-6">
                    <p class="text simple-text contact-hint "><span class="color-text">*</span> Nous promettons de ne pas
                        partager vos informations personnelles avec des tiers.</p>
                </div>
            </div>

            @if($success)
                <div class="alert alert-success mt-4" role="alert">
                    Votre message a bien été envoyé.<br> Nous avons reçu vos informations et nous vous répondrons dans les
                    plus brefs délais.
                </div>
            @endif
        </form>
    </div>

</div>
