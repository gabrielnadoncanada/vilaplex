<div class="col-lg-8">
    <form id="form" class="form mb-100" wire:submit.prevent="submit">
        <div class="row">
            <div class="col-lg-6">
                <label class="label fo" for="firstName">Prénom</label>
                <div class="fo">
                    <input id="firstName" name="firstName" wire:model="firstName" placeholder="John" class="default-link" type="text" required>
                    @error('firstName')
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $message }} </li>
                    </ul>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <label class="label fo" for="lastName">Nom</label>
                <div class="fo">
                    <input id="lastName" name="lastName" wire:model="lastName" placeholder="Doe" class="default-link" type="text" required>
                    @error('lastName')
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $message }} </li>
                    </ul>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label class="label fo" for="email">Email</label>
                <div class="fo">
                    <input id="email" wire:model="email" name="email" placeholder="votre.email@exemple.com" class="default-link" type="email" required>
                </div>
                @error('email')
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $message }} </li>
                </ul>
                @enderror
            </div>
            <div class="col-lg-6">
                <label class="label fo" for="phone">Téléphone</label>
                <div class="fo">
                    <input id="phone" wire:model="tel" name="phone" placeholder="+0 (000) 000 00 00" class="default-link" type="text">
                    @error('tel')
                    <ul class="parsley-errors-list filled">
                        <li class="parsley-required">{{ $message }} </li>
                    </ul>
                    @enderror
                </div>
            </div>
        </div>

        <div class="fade-object">
            <label class="label fo" for="message">Message</label>
            <div class="fo">
                <textarea id="message" wire:model="message" name="message" rows="8" cols="80" placeholder="Tapez votre message ici" class="default-link" type="text" required></textarea>
                @error('message')
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $message }} </li>
                </ul>
                @enderror
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="fo">
                    <button type="submit" class="btn default-link">Envoyer le message</button>
                </div>
            </div>
            <div class="col-lg-8">
                <p class="text simple-text contact-hint fo"><span class="color-text">*</span> Nous promettons de ne pas partager vos informations personnelles avec des tiers.</p>
            </div>
        </div>

        @if($success)
            <div class="alert alert-success mt-4" role="alert">
                Votre message a bien été envoyé.<br> Nous avons reçu vos informations et nous vous répondrons dans les plus brefs délais.
            </div>
        @endif
    </form>
</div>
