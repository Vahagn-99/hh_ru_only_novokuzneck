<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ComfortTypeEmployer extends Model
{
  use HasFactory;
  use Searchable;

  protected $table = 'comfort_type_employer';

  protected $fillable = [
    'comfort_type_id', 'employer_id', 'is_busy_now', 'user_id'
  ];
}
