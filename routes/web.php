<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountyController;
use Illuminate\Support\Facades\Route;

Route::get('/',AppController::class);
Route::get('/counties', CountyController::class);
Route::get('/cities', [CityController::class, 'getCitiesByCountyId']);
Route::get('/getCitiesByCountyId/{county_id}', [CityController::class, 'getCitiesByCountyId']);
Route::post('/addCityToCounty', [CityController::class, 'addCityToCounty']);
Route::post('/deleteCity/{city}', [CityController::class, 'deleteCity']);
Route::post('/modifyCity/{city}', [CityController::class, 'modifyCity']);
