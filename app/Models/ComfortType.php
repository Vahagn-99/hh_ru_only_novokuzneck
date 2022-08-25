<?php

namespace App\Models;

use App\Enums\ComfortTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class ComfortType extends Model
{
  use HasFactory;
  use Searchable;
  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'type' => ComfortTypes::class,
  ];

  protected $fillable = ['type'];

  public function employers()
  {
    return $this->belongsToMany(Employer::class, 'comfort_type_employer');
  }
}
