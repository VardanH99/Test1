<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Test Admin 1
            [
                'firstName' => 'Test',
                'lastName' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ],
            //Test Admin 2
            [
                'name' => 'Test',
                'lastname' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ],
        ]);


    }
}
