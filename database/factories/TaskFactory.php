<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Config::get('categories.categories');
        $randomCategory = $this->faker->randomElement($categories);

        
        return [
            'task' => fake()->text(),
            'due_date' => fake()->dateTimeThisMonth('+30 days'),
            'category' => $randomCategory,
            'completed' => rand(true,false),

            
        ];
    }
}
