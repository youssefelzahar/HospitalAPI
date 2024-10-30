<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Medications;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatments>
 */
class TreatmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        return [
            //
            'treatments_description'=>$this->faker->text(100),
            'dosage'=>$this->faker->numberBetween(int1:1,   int2:5),
            'patient_id'=>Patients::factory(),
            'medication_id'=>Medications::factory(),
            'doctor_id'=>Doctors::factory(),
            'prescribed_treatment'=>$this->faker->randomElement(['Aspirin', 'Panadol', 'Tylenol', 'Acetaminophen']),
        ];
    }
}
