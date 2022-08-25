<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Laravel\Scout\Searchable;

class Car extends Model
{
  use HasFactory;
  use Searchable;


  protected $fillable = [
    'id', 'model', 'comfort_type', 'available', 'is_busy_now', 'driver_id'
  ];

  public function driver()
  {
    return $this->belongsTo(Driver::class, 'driver_id', 'id');
  }

  public function schedulesTimes()
  {
    return $this->hasMany(ScheduledTime::class, 'car_id', 'id');
  }

  /**
   * Get the get Allowed cars.
   *
   * @return Scope
   */
  protected function scopeWhereIsNotBusy($query)
  {
    return $query->where([['is_not_busy', 0], ['available', 1]]);
  }
}
