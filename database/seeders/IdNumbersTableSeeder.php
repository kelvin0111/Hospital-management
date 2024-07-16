<?php
namespace Database\Seeders;
// database/seeders/IdNumbersTableSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdNumbersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $randomId = strval(rand(100000, 999999)); // Convert the random number to a string
            DB::table('doctors_id_codes')->insert([
                'doctor_id_code' => $randomId,
            ]);
        }
    }
}