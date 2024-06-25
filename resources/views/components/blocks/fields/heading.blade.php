@props([
    'heading_level' => 'h2',
    'heading_size' => 'h2',
    'heading_text' => null,
    'split' => false,
    'part1' => null,
    'part2' => null,
])

@if($heading_text)
    @if($split)
        @php
            [$part1, $part2] = explodeNewline(trim($heading_text));
        @endphp
    @endif

    <{{$heading_level}} @class(['fo', $heading_size])>
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
    </{{$heading_level}}>
@endif
