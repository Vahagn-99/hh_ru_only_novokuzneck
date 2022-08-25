<?php

namespace Database\Seeders;

use App\Models\ScheduledTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduledTimeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ScheduledTime::factory(100)->create();
  }
}
