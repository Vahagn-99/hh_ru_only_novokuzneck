<?php

namespace App\Enums;

enum ComfortTyes: int
{
  case first = 1;
  case second = 2;
  case thirt = 3;

  public function getType()
  {
    return $this->value;
  }
}
