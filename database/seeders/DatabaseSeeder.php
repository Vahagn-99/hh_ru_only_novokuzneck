<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(User);
    $this->call(UserSeeder::class);
    $this->call(ComfortTypeSeeder::class);
    $this->call(DriverSeeder::class);
    $this->call(ScheduledTimeSeeder::class);
  }
}
