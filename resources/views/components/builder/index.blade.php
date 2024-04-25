@if(!empty($blocks))
    @foreach($blocks as $block)
        <x-dynamic-component :component="'builder.blocks.' . $block['type']" :block="$block"/>
    @endforeach
@endif
