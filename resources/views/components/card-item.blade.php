@props([
    'badge' => null,
    'image' => null,
    'lightbox' => null,
    'title' => null,
    'text' => null,
    'link' => null,
    ])
<div class="card-item fo">
    <div class="card-cover-frame mb-20">
        @if($badge)
            <div class="badge">{{$badge}}</div>
        @endif
        <div class="cover-overlay"></div>
        <x-blocks.fields.image
            :image="$image"
        />
        <div class="hover-links">
            @if($lightbox)
                <a href="{{$image}}" data-fancybox="works" class="zoom magnetic-link">
                <span class="magnetic-object">
                    <i class="fas fa-expand"></i>
                </span>
                </a>
            @endif
            @if($link)
                <a href="{{$link}}" class="more magnetic-link anima-link">
                    <span class="magnetic-object">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </a>
            @endif
        </div>
    </div>
    @if($title || $text)
        <div class="item-descr">
            <x-blocks.fields.heading
                class="card-title mb-10"
                heading_level="h4"
                heading_size="h4"
                :heading_text="$title"
                :link="$link"
            />
            <x-blocks.fields.text
                :text="$text"
            />
        </div>
    @endif
</div>


