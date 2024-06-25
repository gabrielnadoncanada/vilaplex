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
    } elseif ($type === 'static') {
        $items = $items;
    }

    $categories = [];
    if (count($category_ids) > 0) {
        $categories =  $items->first()->categories()->getRelated()::whereIn('id', $category_ids)->get();
    }
@endphp
<section class="mt-100 mb-100">
    <div class="container-fluid">
        <div class="container">
            <div class="portfolio" id="anchor">
                @if(!empty($categories))
                    <div class="filter mb-40 fo">
                        <a href="#" data-filter="*" class="card-category default-link current">All Categories</a>
                        @foreach($categories as $category)
                            <a href="#" data-filter=".{{$category->slug}}"
                               class="card-category default-link">{{$category->title}}</a>
                        @endforeach
                    </div>
                @endif
                <div class="portfolio-frame">
                    <div class="masonry-grid {{$columns == 33 ? 'grid-3-col' : ''}}">
                        <div class="grid-sizer"></div>
                        @foreach($items as $index => $item)
                            @php
                                $isDoubleHeight = false;
                            @endphp
                            <x-grid-item
                                    data-categories=""
                                    class="{{implode(' ', $item->categories->pluck('slug')->toArray())}} masonry-grid-item-{{$columns}} {{$isDoubleHeight ? 'masonry-grid-item-h-x-2' : ''}}"
                                    :badge="date('d.m.Y',strtotime($item->published_at))"
                                    :image="$show_image ? Storage::url($item->image) : null"
                                    :lightbox="$show_lightbox"
                                    :title="$show_title ? $item->title : null"
                                    :description="$show_description ? $item->description : null"
                                    :link="$item->getPublicUrl()"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
