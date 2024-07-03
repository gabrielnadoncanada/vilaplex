@props([
    'badge' => null,
    'image' => null,
    'lightbox' => null,
    'title' => null,
    'text' => null,
    'link' => null,
    ])
<div class="card-item fo">
    <div class="group relative overflow-hidden w-full flex justify-center pb-[calc(63%_+_8px)] mb-[20px]">
        @if($badge)
            <div
                class="text-main absolute z-[2] bg-[#f7f8fa] no-underline text-[11px] uppercase font-semibold leading-normal tracking-[2px] px-2.5 py-[5px] rounded-none right-0 bottom-0">{{$badge}}</div>
        @endif
        <div
            class="group-hover:opacity-10 absolute bg-[rgba(255,255,255,0)] w-full h-full opacity-60 transition-[0.4s] ease-in-out right-0 top-0"></div>
        <x-blocks.fields.image
            :image="$image"
            class="w-full h-full absolute z-[1] object-cover object-center left-0 top-0"
        />
        <div
            class="opacity-0 group-hover:opacity-100 absolute mt-[-50px] z-[3] bg-[#fcfdff] transition-[0.4s] ease-in-out top-2/4">
            @if($lightbox)
                <a href="{{$image}}" data-fancybox="works" class="zoom magnetic-link">
                <span class="magnetic-object">
                    <i class="text-xl w-5 h-5 text-foreground-dark fas fa-expand"></i>
                </span>
                </a>
            @endif
            @if($link)
                <a href="{{$link}}" class="more magnetic-link anima-link">
                    <span class="magnetic-object">
                        <i class="text-xl w-5 h-5 text-foreground-dark fas fa-arrow-right"></i>
                    </span>
                </a>
            @endif
        </div>
    </div>
    @if($title || $text)
        <div class="text-left">
            <x-text
                as="a"
                theme="h4"
                class="mb-[10px] inline-block"
                :href="$link">
                {{$title}}
            </x-text>
            <x-text as="div">
                {!! $text !!}
            </x-text>
        </div>
    @endif
</div>


