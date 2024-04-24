@if(!empty($blocks))
    @foreach($blocks as $block)
        @php
            if($block['type'] === 'section'){
                $this->sectionCount++;
            }
        @endphp
        <x-dynamic-component :component="'builder.blocks.' . $block['type']" :block="$block"/>
    @endforeach
@endif
