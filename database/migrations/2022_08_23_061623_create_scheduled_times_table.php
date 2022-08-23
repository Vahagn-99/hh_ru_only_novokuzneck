<?php

use App\Models\Employer;
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
    Schema::create('scheduled_times', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(Employer::class)->constrained()->delete('cascade');
      $table->date('start_date');
      $table->date('end_date');
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
    Schema::dropIfExists('scheduled_times');
  }
};
