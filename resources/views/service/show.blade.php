<x-layouts.main>
    @if(!empty($record->content['header_section']))
        <x-render-blocks :blocks="$record->content['header_section']['items']"/>
    @endif
    @if(!empty($record->content['content_section']))
        <x-render-blocks :blocks="$record->content['content_section']['items']"/>
    @endif
    @if(!empty($record->content['footer_section']))
        <x-render-blocks :blocks="$record->content['footer_section']['items']"/>
    @endif
</x-layouts.main>
