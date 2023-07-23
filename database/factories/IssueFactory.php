<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => fake()->numberBetween(10,50),
            'issue' => fake()->unique()->safeEmail(),
            'updated_by' => fake()->name(),
            'remarks' => 'TEST001',
            'status' => fake()->numberBetween(1,3),

            
        ];
    }
}
