<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeatherCities>
 */
class WeatherCitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => fake()->numberBetween(1000, 10000),
            'name' => fake()->city(),
            'weather_description' => fake()->sentence(),
            'weather_icon' => Str::random(3),
            'temp' => fake()->numberBetween(0, 100),
            'temp_min' => fake()->numberBetween(0, 100),
            'temp_max' => fake()->numberBetween(0, 100),
            'feels_like' => fake()->numberBetween(0, 100),
            'humidity' => fake()->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
