<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLogs;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 1),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 0, 999),
            'calories' => $this->faker->randomNumber(4, true),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->realText(100),
        ];
    }
}
