<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
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
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'type' => $this->faker->randomElement(['online', 'offline']),
            'mark' => 20,
            'deadline' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
    public function withScore($count = 10)
    {

        return $this->afterCreating(function (Assignment $assignment) use ($count) {
            $studentIds = Student::factory()->count($count)->create()->pluck('id');

            $syncData = $studentIds->mapWithKeys(function ($id) use ($assignment) {
                return [$id => ['score' => 20, 'assignment_id' => $assignment->id]];
            })->toArray();

            $assignment->students()->sync($syncData);
        });
    }
}
