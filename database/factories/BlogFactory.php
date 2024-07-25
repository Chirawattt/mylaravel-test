<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::limit($this->faker->sentence(), 50),
            'content' => $this->faker->text(),
            'status' => rand(0, 1),
        ];
    }
}
