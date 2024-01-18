<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class tasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'taskName'=>$this->faker->name(),
            'discription'=>$this->faker->paragraph(),
            'status'=>$this->faker->randomElement(['todo','inprogress','completed']),
            'user_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
