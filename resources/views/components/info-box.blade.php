<div
    class="absolute w-[500%] bg-[#f7f8fa] h-screen flex items-center opacity-0 translate-x-[200%] transition-[0.6s] duration-[ease-in-out] delay-[0.05s] p-10 info-box-frame group-[.active]:opacity-100 group-[.active]:translate-x-0 group-[.active]:transition-[0.5s] group-[.active]:duration-[ease-out]">
    <div class="grid grid-cols-1 gap-y-5">
        @if(theme('site_country'))
            <div>
                <x-text as="span" theme="label">Country:</x-text>
                <x-text as="span" theme="text">{{theme('site_country')}}</x-text>
            </div>
        @endif
        @if(theme('site_city'))
            <div>
                <x-text as="span" theme="label">City:</x-text>
                <x-text as="span" theme="text">{{theme('site_city')}}</x-text>
            </div>
        @endif
        @if(theme('site_address'))
            <div>
                <x-text as="span" theme="label">Address:</x-text>
                <x-text as="span" theme="text">{{theme('site_address')}}</x-text>
            </div>
        @endif
        @if(theme('site_email'))
            <div>
                <x-text as="span" theme="label">Email:</x-text>
                <x-text as="a" theme="text" href="tel:{{theme('site_email')}}">
                    {{theme('site_email')}}
                </x-text>
            </div>
        @endif
        @if(theme('site_phone'))
            <div>
                <x-text as="span" theme="label">Phone:</x-text>
                <x-text as="a" theme="text" href="tel:{{theme('site_phone')}}">
                    {{theme('site_phone')}}
                </x-text>
            </div>
        @endif
    </div>
</div>
