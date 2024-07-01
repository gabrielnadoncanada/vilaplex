@props([
    'subtitle_text' => null,
    'subtitle_level' => 'span',
])

@if($subtitle_text)
    <{{$subtitle_level}} {{ $attributes->merge(['class' => 'subtitle']) }}>
    {!! $subtitle_text !!}
    </{{$subtitle_level}}>
@endif
