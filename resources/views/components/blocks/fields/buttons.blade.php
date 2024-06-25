@props(['buttons' => []])

@if(!empty($buttons))
    <div {{ $attributes }}>
        @foreach($buttons as $button)
            <x-blocks.partials.button
                :action="$button['action']"
                :style="$button['style']"
            />
        @endforeach
    </div>
@endif
