<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'driver_license_levels', 'available'
  ];

  public function car()
  {
    return $this->belongsTo(Car::class,'driver_id','id');
  }
}
