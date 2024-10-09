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
                'first_name' => 'Akram',
                'last_name' => 'Doe',
                'gender' => 'male',
                'role' => 'admin',
                'email' => 'ahmedabdelmageed@gmail.com',
                'password' => Hash::make('12345'), // Hashed password
                'image' => null,
            ]
        ]);
    }
}
