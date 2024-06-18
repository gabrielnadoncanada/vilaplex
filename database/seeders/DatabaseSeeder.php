<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\CustomType\CustomType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $postTypes = CustomType::all();

        // Create Categories for each PostType
        $postTypes->each(function ($postType) {
            Category::factory()->count(50)->create([
                'post_type_id' => $postType->id,
            ]);
        });

        // Create Posts for each PostType
        $postTypes->each(function ($postType) {
            Post::factory()->count(50)->create([
                'post_type_id' => $postType->id,
            ]);
        });
    }
}
