<div class="col-lg-8">
    <div class="mry-mb-100 mry-text-center">
        <div class="mry-numbering mry-fo">
            <div
                class="mry-border-text">{{$this->sectionCount < 10 ? "0$this->sectionCount" : $this->sectionCount}}</div>
            <h2 class="mry-subtitle">{!! $block['data']['title'] !!}</h2>
        </div>
        <x-builder :blocks="$block['data']['content']"></x-builder>
    </div>
</div>

