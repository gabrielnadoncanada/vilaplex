<div class="container">
    <div class="mx-auto lg:w-2/3">
        <x-form id="form" class="form mb-[100px]" wire:submit.prevent="submit">
            <div class="grid gap-x-6 md:grid-cols-2 md:gap-y-5">
                <x-form.field>
                    <x-form.label for="firstName">Prénom</x-form.label>
                    <x-form.input
                        wire:model="firstName"
                        name="firstName"
                        type="text"
                        required
                        placeholder="John" />
                    <x-form.error for="firstName"></x-form.error>
                </x-form.field>
                <x-form.field>
                    <x-form.label for="lastName">Nom</x-form.label>
                    <x-form.input
                        wire:model="lastName"
                        name="lastName"
                        type="text"
                        required
                        placeholder="Doe" />
                    <x-form.error for="lastName"></x-form.error>
                </x-form.field>
            </div>
            <div class="grid gap-x-6 md:grid-cols-2 md:gap-y-5">
                <x-form.field>
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input
                        wire:model="email"
                        name="email"
                        type="email"
                        required
                        placeholder="votre.email@exemple.com" />
                    <x-form.error for="email"></x-form.error>
                </x-form.field>
                <x-form.field>
                    <x-form.label for="phone">Téléphone</x-form.label>
                    <div class="">
                        <x-form.input
                            wire:model="phone"
                            name="phone"
                            type="tel"
                            placeholder="+450 (123)-456"
                            required
                        />
                        <x-form.error for="phone"></x-form.error>
                    </div>
                </x-form.field>
            </div>
            <x-form.field>
                <x-form.label for="message">Message</x-form.label>
                <x-form.textarea
                    wire:model="message"
                    name="message"
                    rows="8"
                    cols="80"
                    type="text"
                    placeholder="Tapez votre message ici"
                    required
                />
                <x-form.error for="message"></x-form.error>
            </x-form.field>
            <div class="grid items-center gap-x-6 gap-y-5 lg:grid-cols-12">
                <div class="md:col-span-6 lg:col-span-6">
                    <div>
                        <x-button>Envoyer le message</x-button>

                    </div>
                </div>
                <div class="md:col-span-6">
                    <p class="text leading-4 m-0 contact-hint">
                        <span class="text-primary">*</span> Nous promettons de ne pas partager
                        vos informations personnelles avec des tiers.
                    </p>
                </div>
            </div>
            @if($success)
                <div class="alert alert-success mt-4" role="alert">
                    Votre message a bien été envoyé.<br />
                    Nous avons reçu vos informations et nous vous répondrons dans les plus
                    brefs délais.
                </div>
            @endif
        </x-form>
    </div>
</div>
