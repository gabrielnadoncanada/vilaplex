@if(!empty($blocks))
    @foreach($blocks as $block)
        <x-dynamic-component :component="'builder.blocks.' . strtolower($block['type'])" :block="$block"/>
    @endforeach
@endif
