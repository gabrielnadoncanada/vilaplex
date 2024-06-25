@props(['image' => null])

@if($image)
    <div {{ $attributes->merge(['class' => 'image']) }}>
        <img src="{{ Storage::url($image) }}" alt="">
    </div>
@endif
