@php
    $items = [];
    if ($type === 'dynamic') {
        $query = app($dynamic_type)
        ->where('is_visible', true)
        ->where('published_at', '<=', now())
        ->with('categories')
        ->orderBy($order_by, $order_direction)
        ->limit($limit);
        $items = $query->get();
    }
    elseif ($type === 'static') {
        $items = $items;
    }

    $categories = [];
    if (count($category_ids) > 0) {
        $categories =$items->first()->categories()->getRelated()::whereIn('id',$category_ids)->get();
    }
@endphp
<section class="mb-[100px] mt-[100px]">
    <div class="container">
        <div class="portfolio" id="anchor">
            @if(!empty($categories))
                <div class=" mb-2.5 text-center">
                    <a href="#" data-filter="*"
                       class="relative inline-block no-underline text-[11px] uppercase font-semibold tracking-[2px] text-foreground-dark transition-[0.4s] ease-in-out mr-2.5 rounded-[3px] border-none default-link current"
                    >All Categories</a
                    >
                    @foreach($categories as $category)
                        <a
                            href="#"
                            data-filter=".{{$category->slug}}"
                            class="relative inline-block no-underline text-[11px] uppercase font-semibold tracking-[2px] text-foreground-dark transition-[0.4s] ease-in-out mr-2.5 rounded-[3px] border-none default-link"
                        >{{$category->title}}</a
                        >
                    @endforeach
                </div>
            @endif
            <div class="relative overflow-hidden">
                <div class="masonry-grid {{$columns == 33 ? 'grid-3-col' : ''}}">
                    <div class="grid-sizer"></div>
                    @foreach($items as $index => $item)
                        @php $isDoubleHeight = false;
                        @endphp
                        <div class="masonry-grid-item">
                            <x-card-item
                                data-categories=""
                                class="{{implode(' ', $item->categories->pluck('slug')->toArray())}} masonry-grid-item-{{$columns}} {{$isDoubleHeight ? 'masonry-grid-item-h-x-2' : ''}}"
                                :badge="date('d.m.Y',strtotime($item->published_at))"
                                :image="$show_image ? $item->image : null"
                                :lightbox="$show_lightbox"
                                :title="$show_title ? $item->title : null"
                                :text="$show_text ? $item->text : null"
                                :link="$item->getPublicUrl()"
                            >
                            </x-card-item>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
