<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

if (app()->environment('local'))
  Route::post('avallable-cars', [App\Http\Controllers\Api\CarControler::class, 'avallableCars']);
else
  Route::middleware('auth')->post('avallable-cars', [App\Http\Controllers\Api\CarControler::class, 'avallableCars']);
