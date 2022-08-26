<?php

namespace App\Interfaces;

use App\Models\Car;

interface CarRepositoryInterface
{
  /**
   * Get all avallible cars which Employer can rents at thate time .
   *
   * @param int $employerId  employer id 
   * @param string|null  $searchable
   * 
   * @param datetime $startDate
   * @param datetime $endDate
   * 
   * @return App\Models\Car|null
   */
  public function getAvallibleCars(int $id, $startDate, $endDate, $searchable);
  /**
   * Get current Employer comfort types .
   * can be mor than one .
   * 
   * @param int $employerId  employer id 
   *
   * @return Collection
   */
  public function getEmployerComfortTypes($id);
  /**
   * Get cars which has any schedules but not in the given diapason.
   * 
   * @param int $employerId
   * @param string|null  $searchable
   * 
   * @param datetime $startDate
   * @param datetime $endDate
   * 
   * @return Car|null
   */
  public function getCarsBySchedules(int $int, $startDate, $endDate, $searchable);
  /**
   * Get cars which don't has any schedules.
   * 
   * @param int $employerId
   * @param string|null  $searchable
   * 
   * @return Car|null
   */
  public function getFreeCars(int $int, $searchable);
  /**
   * Get all cars which employer can rented at thate time .
   *
   * @param int $employerId  employer id 
   * @param datetime $startDate
   * @param datetime $endDate
   * @param string|null  $searchable
   * 
   * @return App\Models\Car|collect|null
   */
  public function apply(int $id, $startDate, $endDate, $searchable);
  /**
   * transform given date by pattern.
   * 
   * @param  $date
   * 
   * @return datetime 
   */
  public function dateTransform($date, $pattern);
}
