<?php

namespace Database\Factories;
use App\Models\Doctors;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departments>
 */
class DepartmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Cardiology', 'Orthopedics', 'Pediatrics', 'Neurology']),
            'description'=>$this->faker->text(100),
            'location'=>$this->faker->address(),
            'open_hours'=>$this->faker->dateTime(),
            'doctorid'=>Doctors::factory(),


        ];
    }
}
