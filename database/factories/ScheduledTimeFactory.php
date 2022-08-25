<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledTime>
 */
class ScheduledTimeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'employer_id' => DB::table('employers')->inRandomOrder()->first()->id,
      'start_date' => $this->faker->date('Y-m-d H:00'),
      'end_date' => $this->faker->date('Y-m-d H:00'),
      'car_id' => DB::table('cars')->inRandomOrder()->first()->id,
    ];
  }
}
