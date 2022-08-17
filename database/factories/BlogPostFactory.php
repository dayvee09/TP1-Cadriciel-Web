<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Maisonneuve;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'title_fr' => $this->faker->sentence,
            'body' => $this->faker->paragraph(30),
            'body_fr' => $this->faker->paragraph(30),
            'maisonneuves_id' => Maisonneuve::get()->random()->id
        ];
    }
}
