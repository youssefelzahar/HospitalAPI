<?php

namespace Database\Factories;

use App\Models\Patients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patients>
 */
class PatientsFactory extends Factory
{
    protected $model = Patients::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(0, 100),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
'date_of_birth' => $this->faker->date(),       
     'gender' => $this->faker->randomElement(['Male', 'Female']),

        ];
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
}
