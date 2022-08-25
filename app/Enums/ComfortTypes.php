<?php

namespace App\Enums;

enum ComfortTypes: int
{
  case FIRST = 1;
  case SECOND = 2;
  case THIRT = 3;

  public function getType(): string
  {
    return match ($this) {
      ComfortTypes::FIRST => 1,
      ComfortTypes::SECOND => 2,
      ComfortTypes::THIRT => 3,
    };
  }

  public static function getRandomValue(): string
  {
    $arr =  array();
    $arrDT = ComfortTypes::cases();

    for ($i = 0; $i < ComfortTypes::count(); $i++)
      $arr[$i] = $arrDT[$i]->value;

    $i = array_rand($arr, 1);

    return $arrDT[$i]->value;
  }

  public static function getRandomName(): string
  {
    $arr =  array();
    $arrDT = ComfortTypes::cases();

    for ($i = 0; $i < ComfortTypes::count(); $i++)
      $arr[$i] = $arrDT[$i]->name;

    $i = array_rand($arr, 1);

    return $arrDT[$i]->name;
  }

  public static function count(): int
  {
    return count(ComfortTypes::cases());
  }
}
