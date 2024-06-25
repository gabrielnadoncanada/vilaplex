@props(['action'])

@if($action['type'])
    @if($action['type'] !== 'External')
        @php
            $post = app($action['type'])->find($action['data']['url']);
            if($post)
                $action['data']['url'] = $post->getPublicUrl();
        @endphp
    @endif
    <x-link :href="$action['data']['url']" {{$attributes}}>
        {{$action['data']['label']}}
    </x-link>
@endif
