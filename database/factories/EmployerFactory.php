<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'position_in_company' => $this->faker->text(40),
      'available' => 1,
      'is_busy_now' => 0,
      'user_id' => 0
    ];
  }
}
