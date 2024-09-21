<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */

        return [
            'subject_id' => Subject::inRandomOrder()->first()->id ?? Subject::factory(),  // Dynamically assign or create a Subject
            'class_id' => ClassModel::inRandomOrder()->first()->id ?? ClassModel::factory(),  // Dynamically assign or create a Class
            'teacher_id' => Teacher::inRandomOrder()->first()->id ?? Teacher::factory(),  // Dynamically assign or create a Teacher
            'date' => $this->faker->date(),
            'day_name' => $this->faker->randomElement(['sunday', 'monday', 'tuesday', 'wednesday', 'thursday']),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
