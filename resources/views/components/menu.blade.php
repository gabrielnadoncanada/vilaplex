@props(['items'])

<ul {{ $attributes->merge(['class' => 'w-full m-0 p-0'])  }}>
    @foreach($items as $item)
        @if($item['type'] !== 'External')
            @php
                $post = app($item['type'])->find($item['data']['url']);
                if(!$post['is_visible'] && !$post['published_at'] <= now()){
                    continue;
                }
                if($post) {
                    $item['data']['url'] = $post->getPublicUrl();
                }
            @endphp
        @endif
        <li
            x-data="{ isOpen: false }"
            @click="isOpen = !isOpen"
            x-bind:class="{ 'after:rotate-180': isOpen }"
            class="list-none py-2.5 last:mb-0 {{ !empty($item['children']) ? 'menu-item-has-children' : '' }}">
            <a
                class="text-foreground hover:text-foreground text-[34px] inline-block h-full font-black anima-link default-link"
                href="{{ $item['data']['url'] }}">
                {{ $item['data']['label'] }}
            </a>
            @if(!empty($item['children']))
                <x-menu
                    class="sub-menu max-h-0 overflow-hidden duration-300 ease-in-out pl-5"
                    x-bind:class="{ '!max-h-[300px]': isOpen }"
                    :items="$item['children']"
                />
            @endif
        </li>
    @endforeach
</ul>
