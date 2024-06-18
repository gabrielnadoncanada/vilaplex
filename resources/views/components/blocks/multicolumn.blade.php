<div class="container mt-40">
    <div class="row row-cols-{{ $columns_mobile }} row-cols-md-{{ $columns_desktop }} text-{{ $column_alignment }}">
        @foreach($blocks as $blockItem)
            <div class="col text-center">
                <div class="mb-40 fo {{$blockItem['heading_level']}}">{{ $blockItem['title'] }}</div>

                @if(isset($blockItem['subtitle']) && $blockItem['subtitle'])
                    <p class="subtitle">{{ $blockItem['subtitle'] }}</p>
                @endif

                @if(isset($blockItem['text']) && $blockItem['text'])
                    <div>{!! $blockItem['text'] !!}</div>
                @endif

                {{--            @if(isset($blockItem['primary_action']) && $blockItem['primary_action'])--}}
                {{--                <a href="{{ $blockItem['primary_action'] }}" class="btn btn-primary">Primary Action</a>--}}
                {{--            @endif--}}

                {{--            @if(isset($blockItem['secondary_action']) && $blockItem['secondary_action'])--}}
                {{--                <a href="{{ $blockItem['secondary_action'] }}" class="btn btn-secondary">Secondary Action</a>--}}
                {{--            @endif--}}
            </div>
        @endforeach
    </div>
</div>
