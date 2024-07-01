
<section class="mx-auto mb-[75px] md:mb-[100px] text-center">
    <div class="container">
        <div class="flex justify-center">
            <div class="lg:w-2/3">
                <div class="grid grid-cols-1 gap-y-5">
                    @if($section_number)
                        <div class="numbering">
                            @if($section_number)
                                <div class="border-text">{{$section_number}}</div>
                            @endif
                            <x-text :as="$subtitle_level" theme="subtitle.center">
                                {{$subtitle_text}}
                            </x-text>
                        </div>
                    @endif
                    <x-blocks.fields.heading
                        :heading_size="$heading_size"
                        :heading_level="$heading_level"
                        :heading_text="$heading_text"
                    />
                    <x-text as="div" class="mx-auto mb-[10px]">
                        {!! $text !!}
                    </x-text>

                    <x-blocks.fields.buttons
                        :buttons="$buttons"
                    />
                </div>
                <x-render-blocks :blocks="$blocks"/>
            </div>
        </div>
    </div>
</section>

