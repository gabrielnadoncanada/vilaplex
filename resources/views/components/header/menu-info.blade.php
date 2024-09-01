<div class="w-1/3 hidden md:block">
    <div
        x-show="menuActive"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-x-[200%]"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in-out duration-600 delay-50"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-[200%]"
        class="absolute w-[500%] bg-highlight h-screen flex items-center p-10">
        <div class="grid grid-cols-1 gap-y-5 " id="menu-info">

            @if(theme('header_aside'))
                {!! theme('header_aside') !!}
            @endif

        </div>
    </div>
</div>
