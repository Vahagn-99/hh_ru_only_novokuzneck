<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequset;
use App\Http\Resources\CarInformationResource;
use App\Interfaces\CarRepositoryInterface;

class CarControler extends Controller
{
  /**
   * Create a new class instance.
   *
   * @param  App\Interfaces\CarRepositoryInterface  $carRepository
   * @return void
   */
  public function __construct(protected CarRepositoryInterface $carRepository)
  {
  }

  public function avallableCars(CarRequset $requset)
  {
    $data = $requset->validated();
    $search = isset($data['search']) ? $data['search'] : null;
    $avallableCars = $this->carRepository->getAvallibleCars($requset->employerId(), $data['startDate'], $data['endDate'], $search);

    return CarInformationResource::collection($avallableCars);
  }
}
