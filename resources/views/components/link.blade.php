@props(['href', 'newTab' => false])

<a href="{{ $href }}" {{ $attributes->class(['btn', 'default-link', 'anima-link']) }} @if($newTab) target="_blank" rel="noopener noreferrer" @endif>
    {{ $slot }}
</a>
