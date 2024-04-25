<div class="col-lg-8">
    <div class="mry-mb-100 mry-text-center">
        <div class="mry-numbering mry-fo">
            @if(!empty($block['data']['section_number']))
                <div
                    class="mry-border-text">{{$block['data']['section_number']}}</div>
            @endif
            <div class="mry-subtitle">{!! $block['data']['subtitle'] ?? '' !!}</div>
        </div>
        <h2 class="mry-mb-40 mry-fo mry-h3">{!! $block['data']['title'] !!}</h2>
        <x-builder :blocks="$block['data']['content']"></x-builder>
    </div>
</div>

