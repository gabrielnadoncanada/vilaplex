<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NavigationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = preg_replace('/\./', '', $this->faker->sentence(3));

        return [
            'title' => $title,
            'handle' => Str::slug($title),
        ];
    }
}
