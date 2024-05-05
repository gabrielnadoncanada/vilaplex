<div class="mry-content-frame" id="scroll">
    <x-sections.page-header
        :subtitle="__('app.posts.subtitle')"
        :title="__('app.posts.title')"
        :second_title="__('app.posts.second_title')"
        :description="__('app.posts.excerpt')"
        :image="Storage::url($record->featured_image)"/>
    @include('pages.templates.list', ['record' => $record])
</div>


