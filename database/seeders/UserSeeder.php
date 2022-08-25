<?php

namespace Database\Seeders;

use App\Models\ComfortType;
use App\Models\ComfortTypeEmployer;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::factory(20)->create()->map(function ($user) {
      $employer = Employer::factory()->create([
        'user_id' => $user->id
      ]);
      ComfortTypeEmployer::create(
        [
          'comfort_type_id' => rand(1, 3),
          'employer_id' => $employer->id,
        ]
      );
    });
  }
}
