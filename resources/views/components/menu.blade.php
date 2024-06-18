@props(['items'])

<ul {{ $attributes }}>
    @foreach($items as $item)
        @if($item['type'] !== 'External')
            @php
                $post = app($item['type'])->find($item['data']['url']);
                if($post)
                    $item['data']['url'] = $post->slug;
            @endphp
        @endif
        <li class="menu-item {{!empty($item['children']) ? 'menu-item-has-children' : ''}}">
            <a class="anima-link default-link" href="{{ url($item['data']['url']) }}">{{ $item['data']['label'] }}</a>
            @if(!empty($item['children']))
                <x-menu class="sub-menu" :items="$item['children']"/>
            @endif
        </li>
    @endforeach
</ul>
