<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $slug = Str::slug($name);
        return [
            // fake()->name()
            
            'name' => $name,
            'slug' => $slug,
            "gender" => Arr::random(['L', 'P']),
            "nis" => $this->faker->randomNumber(5, true),
            "class_id" => Arr::random([1,2,3]),
            // 'updated_at' => Carbon::now(),
            // 'created_at' => Carbon::now(),
            
        ];
    }
}
