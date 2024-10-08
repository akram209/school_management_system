<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'salary' => $this->faker->numberBetween(1000, 10000),
            'experience_years' => $this->faker->numberBetween(1, 10),
            'qualification' => $this->faker->text,
            'status' => $this->faker->randomElement(['paid', 'unpaid']),
        ];
    }
}
