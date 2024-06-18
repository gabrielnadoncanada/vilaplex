<x-layouts.main>
    @include(app($post->template)->view, ['post' => $post])
</x-layouts.main>
