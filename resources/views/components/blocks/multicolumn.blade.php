<div class="container mt-40">
    <div class="row row-cols-{{ $columns_mobile }} row-cols-md-{{ $columns_desktop }} text-{{ $column_alignment }}">
        @foreach($blocks as $blockItem)
            <div class="col text-center mb-100">
                <div class="numbering">
                    @if(isset($blockItem['subtitle']) && $blockItem['subtitle'])
                        <p class="subtitle mb-0">{{ $blockItem['subtitle'] }}</p>
                    @endif
                </div>
                @if($blockItem['title'])
                    @php
                    $marginClass = '';
                    @endphp

                    <div class="fo {{$blockItem['heading_level']}}">
                        {{ $blockItem['title'] }}
                    </div>
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
