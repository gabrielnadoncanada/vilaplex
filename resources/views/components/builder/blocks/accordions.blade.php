<x-accordions class="mt-6 space-y-6 divide-y divide-gray-900/10 border-t-gray-900/10 border-t">
    @php
        $activeAccordion = 0;
    @endphp
    @foreach($block['data']['accordion'] as $key => $accordion)
        <x-accordion :index="$activeAccordion" :title="$accordion['title']">
            {!! $accordion['content'] !!}
        </x-accordion>
        @php
            $activeAccordion++;
        @endphp
    @endforeach
</x-accordions>
