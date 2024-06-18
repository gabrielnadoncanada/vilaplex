<?php

namespace Database\Factories\Service;

use App\Enums\PublishedStatus;
use App\Models\Service\Post;
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
            'template' => 'App\\Filament\\Templates\\ServicePost\\Single',
            'status' => PublishedStatus::PUBLISHED,
            'image' => $this->createImage(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
