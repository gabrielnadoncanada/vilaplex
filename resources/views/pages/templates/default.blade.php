<x-sections.page-header
    :subtitle="__('app.service.subtitle')"
    :title="$record->title"
    :description="$record->excerpt"
    :image="Storage::url($record->featured_image)"/>
@php
    $this->sectionCount = 0;
@endphp
<div class="mry-about mry-p-100-100">
    <div class="container">
        <div class="row justify-content-center">
            <x-builder :blocks="$record->content"></x-builder>
        </div>
    </div>
</div>
<x-sections.call-to-action/>
<x-sections.footer/>
