@props(['buttons' => []])

@if(!empty($buttons))
    <div {{ $attributes->merge(['class' => 'flex flex-col sm:flex-row gap-y-2 items-center justify-center']) }}>
        @foreach($buttons as $button)

            @if($button['action']['type'])
                @if($button['action']['type'] !== 'External')
                    @php
                        $post = app($button['action']['type'])->find($button['action']['data']['url']);
                        if($post)
                            $button['action']['data']['url'] = $post->getPublicUrl();
                    @endphp
                @endif
                <x-button :theme="$button['style']" :href="$button['action']['data']['url']" :newTab="$button['action']['data']['target'] === '_blank'" {{$attributes}}>
                    {!! $button['action']['data']['label'] !!}
                </x-button>
            @endif
        @endforeach
    </div>
@endif
