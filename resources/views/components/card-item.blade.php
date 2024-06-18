@props([
    'badge' => null,
    'image' => null,
    'lightbox' => null,
    'title' => null,
    'description' => null,
    'link' => null,
    ])
<div class="card-item">
    <div class="card-cover-frame mb-20 fo">
        @if($badge)
            <div class="badge">{{$badge}}</div>
        @endif
        <div class="cover-overlay"></div>
        @if($image)
            <img src="{{$image}}" alt="project">
        @endif
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
    @if($title || $description)
        <div class="item-descr fo">
            @if($title)
                <h4 class="card-title mb-10 fo">
                    @if($link)
                        <a href="{{$link}}">
                            {{$title}}
                        </a>
                    @else
                        {{$title}}
                    @endif
                </h4>
            @endif
            @if($description)
                <div class="text">{{$description}}</div>
            @endif
        </div>
    @endif
</div>


