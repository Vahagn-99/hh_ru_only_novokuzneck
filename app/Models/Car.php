<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  use HasFactory;

  protected $fillable = [
    'model', 'comfort_type', 'available', 'is_busy_now','driver_id'
  ];

  public function driver()
  {
    return $this->hasOne(Driver::class, 'driver_id', 'id');
  }
}
