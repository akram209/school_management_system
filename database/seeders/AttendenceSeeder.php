<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendence;

class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendence::factory()->count(100)->create();
    }
}
