<x-cursor />

<header x-data="{ menuActive: false }">
    <div class="lg:h-[100px] fixed z-[99] flex justify-between items-center h-[75px] w-full duration-300 ease-in-out left-0 top-0">
        <x-header.logo />
        <x-header.menu-toggle />
    </div>
    <x-header.navigation-menu />
</header>


