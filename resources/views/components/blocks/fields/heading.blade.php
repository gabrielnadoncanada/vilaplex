@props([
    'heading_level' => 'h2',
    'heading_size' => 'h2',
    'heading_text' => null,
    'split' => false,
    'link' => null,
    'part1' => null,
    'part2' => null,
])

@if($heading_text)
    @if($split)
        @php
            [$part1, $part2] = explodeNewline(trim($heading_text));
        @endphp
    @endif

    <{{$heading_level}} {{$attributes->merge(['class' => $heading_size])}}>
    @if($link)
        <a href="{{$link}}">
            @endif
            @if($part1 || $part2)
                {{$part1}}
                @if($part2)
                    <br>
                    <span class="border-text">{{ $part2 }}</span>
                    <span class="animation-el"></span>
                @endif
            @else
                {{ $heading_text }}
            @endif
            @if($link)
        </a>
    @endif
    </{{$heading_level}}>
@endif
