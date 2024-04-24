<?php

namespace Database\Factories;

use App\Models\Category;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $name = $this->faker->unique()->words(3, true),
            'slug' => Str::slug($name),
            'featured_image' => Storage::disk('public')->putFile('/categories/featured_images', public_path(config('seeding.image_placeholder_path'))),
        ];
    }
}
