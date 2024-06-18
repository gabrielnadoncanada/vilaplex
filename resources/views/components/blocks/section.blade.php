<section class="col-lg-12 mb-100 text-center">
    @if($section_number || $block['data']['subtitle'])
        <div class="numbering fo">
            @if($section_number)
                <div
                    class="border-text">{{$section_number}}</div>
            @endif
            @if($subtitle)
                <div class="subtitle">{{$subtitle}}</div>
            @endif
        </div>
    @endif
    <div class="mb-40 fo {{$heading_level}}">{{ $title }}</div>
    <div class="mb-40">
        {!! $text !!}
    </div>

    @if($primary_action && $primary_action['type'])
        @if($primary_action['type'] !== 'External')
            @php
                $post = app($primary_action['type'])->find($primary_action['data']['url']);
                if($post)
                    $primary_action['data']['url'] = $post->slug;
            @endphp
        @endif

        <x-link :href="$primary_action['data']['url']">
            {{$primary_action['data']['label']}}
        </x-link>
    @endif
    @if($secondary_action && $secondary_action['type'])
        @if($secondary_action['type'] !== 'External')
            @php
                $post = app($secondary_action['type'])->find($secondary_action['data']['url']);
                if($post)
                    $secondary_action['data']['url'] = $post->slug;
            @endphp
        @endif

        <x-link class="btn-text" :href="$secondary_action['data']['url']">
            {{$secondary_action['data']['label']}}
        </x-link>
    @endif


    <x-render-blocks :blocks="$blocks"/>
</section>

