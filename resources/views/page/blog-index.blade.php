<x-layouts.main>
    @if(!empty($record->content['header_section']))
        <x-render-blocks :blocks="$record->content['header_section']['items']"/>
    @endif
    @php
        $items = \App\Models\Blog\Post::published();
    @endphp
    <x-grid-container>
        @foreach($items as $item)
            <x-grid-item
                :badge="date('d.m.Y',strtotime($item->published_at))"
                :image="Storage::url($item->image)"
                :lightbox="false"
                :title="$item->title"
                :description="$item->description"
                :link="$item->slug"
            />
        @endforeach
    </x-grid-container>
    @if(!empty($record->content['content_section']))
        <x-render-blocks :blocks="$record->content['content_section']['items']"/>
    @endif
    @if(!empty($record->content['footer_section']))
        <x-render-blocks :blocks="$record->content['footer_section']['items']"/>
    @endif
</x-layouts.main>
