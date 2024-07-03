<section class="mx-auto mb-[35px] sm:mb-[75px] text-center md:mb-[100px]">
    <div class="container">
        <div class="flex justify-center">
            <div class="lg:w-2/3">
                <div class="grid grid-cols-1 gap-y-5">
                    @if($section_number)
                        <div class="numbering text-center">
                            @if($section_number)
                                <div class="border-text text-7xl/[1.5] font-black opacity-10">{{$section_number}}</div>
                            @endif
                            <x-text :as="$subtitle_level" theme="subtitle.center">
                                {{$subtitle_text}}
                            </x-text>
                        </div>
                    @endif
                    <x-text
                        :as="$heading_level"
                        :theme="$heading_size">
                        {{$heading_text}}
                    </x-text>
                    <x-text as="div" class="mx-auto mb-[10px]"> {!! $text !!} </x-text>

                    <x-blocks.fields.buttons :buttons="$buttons" />
                </div>
                <x-render-blocks :blocks="$blocks" />
            </div>
        </div>
    </div>
</section>
