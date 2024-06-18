<?php

namespace App\Filament\Fields;

use App\Models\Blog\Post;
use Filament\Forms\Components\Select;

class PostSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->options(function () {
            $posts = Post::select('id', 'title', 'custom_type_id')
                ->get()
                ->groupBy('postType.name');
            $options = [];
            foreach ($posts as $postTypeName => $postsGroup) {
                foreach ($postsGroup as $post) {
                    $options[$postTypeName][$post->id] = $post->title;
                }
            }

            return $options;
        });
    }
}
