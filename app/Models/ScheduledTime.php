<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledTime extends Model
{
  use HasFactory;

  protected $fillabe = [
    'employer_id', 'start_date', 'end_date'
  ];

  public function employer()
  {
    return $this->belongsTo(Employer::class, 'employer_id', 'id');
  }
}
