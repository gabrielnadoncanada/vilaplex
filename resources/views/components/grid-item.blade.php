<div {{$attributes->class(['masonry-grid-item'])}}>
    <x-card-item
        :badge="$badge"
        :image="$image"
        :lightbox="$lightbox"
        :title="$title"
        :description="$description"
        :link="$link"
    >
    </x-card-item>
</div>
