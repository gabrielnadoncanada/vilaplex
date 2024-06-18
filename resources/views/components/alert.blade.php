<div {{ $attributes->merge(['class' => $theme()]) }} x-data="{ show: true, message: '{{$message}}' }"
     class="fixed-container"
     x-show="show"

     x-bind:class="{ 'hidden-fade': !show }"
     x-init="setTimeout(() => show = false, 2000)"
>
    <div class="notification-container">
        <div
             class="pointer-events-auto bg-white shadow-lg ring-1 ring-black ring-opacity-5">

            <div class="content-container">
                <div class="border-l-4 border-{{ $type }} notification-box">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('/svg/status/' . $type . '.svg') }}" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm " x-text="message">
                                <!-- Message will be dynamically inserted here -->
                            </p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" @click="show = false"
                                        class="close-button focus:ring-green-600">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="icon-size" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
