<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,


            'email' => $this->faker->text,
            'password' => $this->faker->text,

            'phone' => $this->faker->unique()->numerify('##########'),
            'address' => $this->faker->title,

        ];
    }
}