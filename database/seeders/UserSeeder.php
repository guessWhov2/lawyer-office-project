<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(storage_path('app/mock-data/mock-data-user'), 'r');

        while (($data = fgetcsv($csvFile)) !== false) {
            DB::table('users')->insert([
                'firstname' => $data[0],
                'lastname' => $data[1],
                'phone_number' => $data[2],
                'email' => $data[3],
                'address' => $data[4],
                'city' => $data[5],
                'password' => Hash::make($data[6]),
                // Add other columns as needed
            ]);
        }

        fclose($csvFile);
    }
}
