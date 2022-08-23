<?php

use App\Models\ComfortType;
use App\Models\EmployerComfort;
use App\Models\User;
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
    Schema::create('employers', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(User::class)->constrained()->delete('cascade');
      $table->boolean('position_in_company')->comment('1->yes,0->no');
      $table->boolean('available')->comment('1->yes,0->no');
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
    Schema::dropIfExists('employers');
  }
};
