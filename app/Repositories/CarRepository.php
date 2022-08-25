<?php

namespace App\Repositories;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;
use App\Models\Employer;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class CarRepository implements CarRepositoryInterface
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
  public function getAvallibleCars(int $employerId, $startDate, $endDate, $searchable = null)
  {
    return $this->apply($employerId, $startDate, $endDate, $searchable);
  }

  /**
   * Get current Employer comfort types .
   * can be mor than one .
   * 
   * @param int $employerId  employer id 
   *
   * @return Collection
   */
  public function getEmployerComfortTypes($employerId)
  {
    return Employer::find($employerId)->comfortTypes->map(fn ($type) => $type->type->value);
  }

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
  public function getCarsBySchedules(int $employerId, $startDate, $endDate, $searchable = null)
  {
    return Car::search($searchable)
      ->query(fn ($query) => $query
        ->whereHas('schedulesTimes', function ($query) use ($startDate, $endDate) {
          $query
            ->whereNotBetween('start_date', [$startDate, $endDate])
            ->whereNotBetween('end_date', [$startDate, $endDate]);
        })
        ->whereIn('comfort_type', $this->getEmployerComfortTypes($employerId)))
      ->get();
  }

  /**
   * Get cars which don't has any schedules.
   * 
   * @param int $employerId
   * @param string|null  $searchable
   * 
   * @return Car|null
   */
  public function getFreeCars(int $employerId, $searchable = null)
  {

    return Car::search($searchable)
      ->query(fn ($query) => $query->whereIn(
        'comfort_type',
        $this->getEmployerComfortTypes($employerId)
      )->doesntHave('schedulesTimes'))
      ->get();
  }

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
  public function apply(int $employerId, $startDate, $endDate, $searchable = null)
  {
    $notScheduledCars = $this->getCarsBySchedules(
      $employerId,
      $this->dateTransform($startDate),
      $this->dateTransform($endDate),
      $searchable
    );
    $freeCars =  $this->getFreeCars($employerId, $searchable);
    $result = $notScheduledCars->merge($freeCars);
    return $result;
  }

  /**
   * transform given date by pattern.
   * 
   * @param  $date
   * 
   * @return datetime 
   */
  public function dateTransform($date, $pattern = "Y-m-d H:00")
  {
    return DateTime::createFromFormat($pattern, $date);
  }
}
