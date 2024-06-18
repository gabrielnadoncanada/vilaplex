<?php

namespace Database\Factories\Blog;

use App\Enums\PublishedStatus;
use App\Models\Blog\Post;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    use CanCreateImages;

    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->sentence,
            'published_at' => $this->faker->optional()->dateTime,
            'content' => $this->faker->optional()->text,
            'template' => 'App\\Filament\\Templates\\BlogPost\\Single',
            'status' => PublishedStatus::PUBLISHED,
            'image' => $this->createImage(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
