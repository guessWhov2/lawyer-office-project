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
                'email_verified_at' => $data[4],
                'address' => $data[5],
                'city' => $data[6],
                'password' => Hash::make($data[7]), // Hash the password
                // Add other columns as needed
            ]);
        }

        fclose($csvFile);
    }
}
