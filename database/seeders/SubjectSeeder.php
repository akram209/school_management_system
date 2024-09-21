<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'English',
            'Maths',
            'Science',
            'History',
            'Geography',
            'Biology',
            'Chemistry',
            'Physics',
        ];

        foreach ($subjects as $subject) {
            Subject::Create([
                'name' => $subject,
            ]);
        }
    }
}
