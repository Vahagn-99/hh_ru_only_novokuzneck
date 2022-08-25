<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employer extends Model
{
  use HasFactory;

  protected $fillable = [
    'position_in_company', 'available', 'is_busy_now', 'user_id'
  ];


  public function comfortTypes()
  {
    return $this->belongsToMany(ComfortType::class, 'comfort_type_employer');
  }

  public function schedulesTimes()
  {
    return $this->hasMany(ScheduledTime::class, 'employer_id', 'id');
  }
}
