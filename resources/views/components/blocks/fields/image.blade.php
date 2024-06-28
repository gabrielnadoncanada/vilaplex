@props(['image' => null])

@if($image)
    <img {{ $attributes->merge(['class' => 'image']) }} src="{{ Storage::url($image) }}" alt="">
@endif
