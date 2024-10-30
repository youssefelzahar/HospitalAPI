<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointments;
use App\Models\Doctors; 
use App\Models\Patients; 
use App\Models\Departments;
use Faker\Factory as faker;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        for ($i = 1; $i <= 100; $i++) {
            // Fetch the doctor's name based on the doctor ID
            $doctorName = Doctors::find($i)->name ?? 'Default Name'; // Provide a fallback
    
            Appointments::create([
                'doctorid' => $i,
                'patientid' => $i,
                'departmentid' => $i,
                'date_of_appointment' => now()->addDays($i),
                'status' => $faker->randomElement(['pending', 'confirmed', 'canceled']), // Use the Faker instance here
                'name of doctor' => $doctorName,
            ]);
        }
    

    }
}
