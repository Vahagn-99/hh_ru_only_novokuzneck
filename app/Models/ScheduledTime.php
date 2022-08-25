<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduledTime extends Model
{
  use HasFactory;


  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'start_date' => 'datetime:Y-m-d H:00',
    'end_date' => 'datetime:Y-m-d H:00',
  ];

  protected $fillabe = [
    'employer_id', 'start_date', 'end_date', 'car_id'
  ];

  public function employer()
  {
    return $this->belongsTo(Employer::class, 'employer_id', 'id');
  }

  public function car()
  {
    return $this->belongsTo(Car::class, 'car_id', 'id');
  }
}
