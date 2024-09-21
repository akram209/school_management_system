<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => Subject::factory(),
            'class_id' => ClassModel::factory(),
            'start_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'date' => $this->faker->date,
            'type' => $this->faker->randomElement(['mid', 'final']),
            'title' => $this->faker->text(20),
            'description' => $this->faker->text,
        ];
    }
}
