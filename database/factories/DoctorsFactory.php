<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctors>
 */
class DoctorsFactory extends Factory
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
            'department' =>  $this->faker->randomElement(['Cardiology', 'Orthopedics', 'Pediatrics', 'Neurology']),
            'phone' => $this->faker->phoneNumber,
           'work_hours' => $this->faker->dateTime(),       
            'gender' => $this->faker->randomElement(['Male', 'Female']),

        ];
    }
}
