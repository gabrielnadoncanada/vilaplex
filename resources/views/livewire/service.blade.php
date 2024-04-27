<div class="mry-content-frame" id="scroll">
    <x-sections.page-header
        :subtitle="__('app.service.subtitle')"
        :title="$record->title"
        :description="$record->excerpt"
        :image="Storage::url($record->featured_image)"/>
    @include('pages.templates.default', ['record' => $record])
</div>

