<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ucwords($this->faker->word()),
            'description' => $this->faker->text(),
            'author_id' => User::factory(),
        ];
    }
}