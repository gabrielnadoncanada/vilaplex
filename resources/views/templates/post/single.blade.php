<div class="content-frame" id="scroll">
     @php
        $headerBanner = $post->getContentValue('header_banner');
    @endphp


    @if($headerBanner)
        <x-blocks.banner
            :subtitle="$headerBanner['subtitle']"
            :title="$headerBanner['title']"
            :description="$headerBanner['description']"
            :image="$headerBanner['image']">
            <x-slot:actions>
                <div class="scroll-hint-frame">
                    <a class="scroll-hint smooth-scroll magnetic-link fo" href="#anchor">
                        <span class="magnetic-object"></span>
                    </a>
                    <div class="label fo">{{ __('app.scroll_down') }}</div>
                </div>
            </x-slot:>
        </x-blocks.banner>
    @endif

     @php
        $footerBanner = $post->getContentValue('footer_banner');
    @endphp
    @if($footerBanner && $footerBanner['enabled'])
        <x-blocks.banner
            class="pt-0 mt-140"
            :subtitle="$footerBanner['subtitle']"
            :title="$footerBanner['title']"
            :description="$footerBanner['description']"
            :image="$footerBanner['image']">
            <x-slot:actions>
                @if($footerBanner['primary_action'] && $footerBanner['primary_action']['type'])
                    @if($footerBanner['primary_action']['type'] !== 'External')
                        @php
                            $post = app($footerBanner['primary_action']['type'])->find($footerBanner['primary_action']['data']['url']);
                            if($post)
                                $footerBanner['primary_action']['data']['url'] = $post->slug;
                        @endphp
                    @endif

                    <x-link :href="$footerBanner['primary_action']['data']['url']">
                        {{$footerBanner['primary_action']['data']['label']}}
                    </x-link>
                @endif
                @if($footerBanner['secondary_action'] && $footerBanner['secondary_action']['type'])
                    @if($footerBanner['secondary_action']['type'] !== 'External')
                        @php
                            $post = app($footerBanner['secondary_action']['type'])->find($footerBanner['secondary_action']['data']['url']);
                            if($post)
                                $footerBanner['secondary_action']['data']['url'] = $post->slug;
                        @endphp
                    @endif

                    <x-link class="btn-text" :href="$footerBanner['secondary_action']['data']['url']">
                        {{$footerBanner['secondary_action']['data']['label']}}
                    </x-link>
                @endif
            </x-slot:>
        </x-blocks.banner>
    @endif
</div>
