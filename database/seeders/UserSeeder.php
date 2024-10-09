<?php

namespace Database\Seeders;

use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
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

        DB::table('users')->insert([
            [
                'first_name' => 'Abdullah',
                'last_name' => 'Mohamed',
                'gender' => 'male',
                'role' => 'admin',
                'email' => 'abdullah@gmail.com@gmail.com',
                'password' => Hash::make('123456'), // Hashed password
                'image' => null,
            ]
        ]);
    }
}
