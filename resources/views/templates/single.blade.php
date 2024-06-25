<x-layouts.main>
    @if(!empty($record->content['header_section']))
        <x-render-blocks :blocks="$record->content['header_section']"/>
    @endif
    <div class="container">
        @if(!empty($record->content['content_section']))
            <x-render-blocks :blocks="$record->content['content_section']"/>
        @endif
    </div>
    @if(!empty($record->content['footer_section']))
        <x-render-blocks :blocks="$record->content['footer_section']"/>
    @endif
</x-layouts.main>
