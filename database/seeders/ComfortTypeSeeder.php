<?php

namespace Database\Seeders;

use App\Enums\ComfortTypes;
use App\Models\ComfortType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComfortTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ComfortType::create([
      'type' => ComfortTypes::FIRST
    ]);
    ComfortType::create([
      'type' => ComfortTypes::SECOND
    ]);
    ComfortType::create([
      'type' => ComfortTypes::THIRT
    ]);
  }
}
