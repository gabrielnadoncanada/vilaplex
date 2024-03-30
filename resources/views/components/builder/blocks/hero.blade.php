<x-sections.hero
    :title="$block['data']['content']"
    :buttonLink="$block['data']['link']"
    :imageUrl="$block['data']['image']"
>
    <x-slot:buttonText class="space-x-1 flex">
        {{__('app.home.hero.button_text')}}
        <i class="pl-1 fa-sharp fa-regular fa-user-magnifying-glass"></i>
    </x-slot:buttonText>
</x-sections.hero>
