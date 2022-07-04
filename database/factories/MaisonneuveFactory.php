<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaisonneuveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber(),
            'ddn' => $this->faker->dateTimeBetween('1950-01-01', '2004-01-01'),
            'ville_id' => Ville::get()->random()->id
        ];
    }
}
