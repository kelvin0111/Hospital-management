<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the medical_departments table
        $departments = [
            ['department_id' => 1, 'doctor_id' => 2, 'active' => true],
            ['department_id' => 2, 'doctor_id' => 3, 'active' => true],
            // Add more departments as needed
        ];

        // Insert the data into the doctor_departments table
        DB::table('doctor_departments')->insert($departments);
    }
}
