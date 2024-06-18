<?php

namespace Database\Factories;

use App\Enums\PublishedStatus;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    use CanCreateImages;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->sentence,
            'content' => $this->faker->optional()->text,
            'status' => PublishedStatus::PUBLISHED,
            'template' => 'App\\Filament\\Templates\\Page\\Single',
            'image' => $this->createImage(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
