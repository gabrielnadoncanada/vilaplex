<x-layouts.main>


    @if(!empty($record->content['header_section']))
        <x-render-blocks :blocks="$record->content['header_section']"/>
    @endif
    @if(!empty($record->content['content_section']))
        <x-render-blocks :blocks="$record->content['content_section']"/>
    @endif
    @if(!empty($record->content['footer_section']))
        <x-render-blocks :blocks="$record->content['footer_section']"/>
    @endif

    @push('scripts')
        <script src="{{asset("js/plugins/canvas.js")}}"></script>
    @endpush
</x-layouts.main>
