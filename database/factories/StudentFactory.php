<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Exam;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'class_id' => ClassModel::factory(),
        ];
    }
    public function withParents($count = 2)
    {
        return $this->afterCreating(function (Student $student) use ($count) {
            $parents = ParentModel::factory()->count($count)->create();
            $student->parents()->attach($parents->pluck('id')); // Attach parents via pivot
        });
    }

    // Attach assignments to the student


    // Attach exams to the student
    public function withExams($count = 2)
    {
        return $this->afterCreating(function (Student $student) use ($count) {
            $exams = Exam::factory()->count($count)->create();
            $student->exams()->attach($exams->pluck('id'), ['score' => 10]); // Attach exams via pivot
        });
    }
}
