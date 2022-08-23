<?php

use App\Models\Driver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cars', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Driver::class);
      $table->string('model');
      $table->string('comfort_type')->default(1);
      $table->boolean('available')->default(1)->comment('1->yes,0->no');
      $table->boolean('is_busy_now')->default(0)->comment('1->yes,0->no');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cars');
  }
};
