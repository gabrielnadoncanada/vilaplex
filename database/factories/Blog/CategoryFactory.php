<?php

namespace Database\Factories\Blog;

use App\Enums\PublishedStatus;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    use CanCreateImages;

    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->optional()->sentence,
            'image' => $this->createImage(),
            'status' => PublishedStatus::PUBLISHED,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
