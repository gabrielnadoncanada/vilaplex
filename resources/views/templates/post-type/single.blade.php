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

            </x-slot:>
        </x-blocks.banner>
    @endif
    <x-grid-container>
        @foreach($post->posts as $item)
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
    @php
        $footerBanner = $post->getContentValue('footer_banner');
    @endphp
    @if($footerBanner['enabled'])
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
