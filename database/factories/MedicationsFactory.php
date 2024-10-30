<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medications>
 */
class MedicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Aspirin', 'Panadol', 'Tylenol', 'Acetaminophen']),
            'dosage' => $this->faker->numberBetween(1, 5),
            'expire_date'=> $this->faker->date(),
            'quantityavailable'=>$this->faker->numberBetween(0, 100),

        ];
    }
}
