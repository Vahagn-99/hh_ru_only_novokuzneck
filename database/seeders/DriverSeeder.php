<?php

namespace Database\Seeders;

use App\Enums\ComfortTypes;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
  const CAR_MODELS =  ['BMW', 'OPEL', 'NISSAN', 'VOLGA', 'SHEVROLET', 'INFINITY', 'OTHER'];
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Driver::factory(20)->create()->map(function ($driver) {
      $driver->car()->create(
        [
          'model' => self::CAR_MODELS[rand(0, count(self::CAR_MODELS)-1)],
          'comfort_type' => ComfortTypes::getRandomValue(),
          'available' => 1,
          'is_busy_now' => 0,
        ]
      );
      // Car::factory()->create();
    });
  }
}
