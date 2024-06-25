@props(['subtitle' => null])

@if($subtitle)
    <div {{ $attributes->merge(['class' => 'subtitle fo']) }}>
        {{ $subtitle }}
    </div>
@endif
