<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassModel>
 */
class ClassModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function  withSubjects($count = 2)
    {
        return $this->afterCreating(function (ClassModel $class) use ($count) {
            $subjects = Subject::factory()->count($count)->create();
            $class->subjects()->attach($subjects->pluck('id')); // Attach subjects via pivot
        });
    }
}
