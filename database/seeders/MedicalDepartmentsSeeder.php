<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MedicalDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the medical_departments table
        $departments = [
            ['department' => 'Neurology', 'active' => true],
            ['department' => 'Family Medicine', 'active' => true],
            // Add more departments as needed
        ];

        // Insert the data into the medical_departments table
        DB::table('medical_departments')->insert($departments);
    }
}

