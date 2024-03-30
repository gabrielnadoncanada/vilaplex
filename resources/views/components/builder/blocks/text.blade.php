<x-text :as="$block['data']['level']" :theme="$block['data']['level']"
        class="text-{{$block['data']['alignment']}}">
    {!! $block['data']['content'] !!}
</x-text>
