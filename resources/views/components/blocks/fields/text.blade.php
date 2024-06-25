@props(['text' => null])

@if($text)
    <div {{$attributes->merge(['class' => 'text'])}}>
        {!! $text !!}
    </div>
@endif
