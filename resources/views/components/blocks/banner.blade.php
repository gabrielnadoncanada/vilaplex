<section class="pt-[100px] md:pt-[140px] mb-[75px] md:mb-[100px]">
    <div class="absolute z-[-2] h-[550px] w-full left-0 top-0">
        <x-blocks.fields.image
            class="w-full h-[550px] object-cover object-center"
            :image="$image"/>
        <div class="absolute w-full h-[555px] bg-[linear-gradient(0deg,#f7f8fa_1%,rgba(247,248,250,0.94)_100%,rgba(247,248,250,0.89)_100%)] left-0 top-0"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="grid grid-cols-1 gap-y-5 text-center w-full">
                <x-text :as="$subtitle_level" theme="subtitle.center">
                    {{$subtitle_text}}
                </x-text>
                <x-blocks.fields.heading
                    class="md:mb-[10px]"
                    :split="true"
                    :heading_text="$heading_text"
                    :heading_level="$heading_level"
                    :heading_size="$heading_size"
                />
                <x-text as="div" class="max-w-650px mx-auto mb-[10px]">
                    {!! $text !!}
                </x-text>
                <x-blocks.fields.buttons
                    :buttons="$buttons"
                />
            </div>
        </div>
    </div>
</section>
