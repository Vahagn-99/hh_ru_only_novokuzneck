<?php

namespace App\Interfaces;

use App\Models\Car;

interface CarRepositoryInterface
{
  public function getAvallibleCars(int $id, $startDate, $endDate, $searchable);
  public function getEmployerComfortTypes($id);
  public function getCarsBySchedules(int $int, $startDate, $endDate, $searchable);
  public function getFreeCars(int $int, $searchable);
  public function apply(int $id, $startDate, $endDate, $searchable);
  public function dateTransform($date, $pattern);
}
