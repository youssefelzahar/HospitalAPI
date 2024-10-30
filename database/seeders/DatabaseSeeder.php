<?php

namespace Database\Seeders;
use App\Models\Patients;
use App\Models\Doctors;
use App\Models\Departments;
use App\Models\Treatments;
use App\Models\Medications;
use App\Models\Billing;
use App\Models\Appointments;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Patients::factory(count: 100)->create();

        Doctors::factory(100)->create();
        Departments::factory(100)->create();
        Treatments::factory(100)->create();
        Medications::factory(100)->create();

        Billing::factory(100)->create();
        //Appointments::factory(50)->create();
        $this->call(AppointmentsSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
