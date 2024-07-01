<x-cursor/>

<header>
    <x-top-panel/>
    <div class="menu group">
        <div class="container mx-auto">
            <div class="flex  gap-x-6 gap-y-5 justify-between">
                <div class="md:w-1/3 w-full px-4">
                    <nav
                        class="dynamic-menu flex items-center h-screen group-[.active]:opacity-1 group-[.active]:translate-x-0  group-[.active]:scale-100 group-[.active]:transition-[0.5s] group-[.active]:duration-[ease-out]">
                        @php
                            $menu =  App\Models\Navigation::find(app(App\Settings\ThemeSettings::class)->header_menu_id);
                        @endphp
                        @if($menu)
                            <x-menu :items="$menu->items"/>
                        @endif
                    </nav>
                </div>

                <div class="w-1/3 hidden md:block ">
                    <x-info-box/>
                </div>
            </div>
        </div>
    </div>
</header>


