@if (!app()->isProduction())
    <div
        class="fi-dev-banner">
        <div>
            L'application est en mode test. Les données ne sont pas fiables et
            peuvent être effacées à tout moment. Amusez-vous!
        </div>
    </div>
@endIf
