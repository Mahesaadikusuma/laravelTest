<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class Student_ExtracurricularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "student_id" => Arr::random([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            "extracurriculars_id" => Arr::random([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            
            
            
            // 'updated_at' => Carbon::now(),
            // 'created_at' => Carbon::now(),
            
        ];
    }
}
