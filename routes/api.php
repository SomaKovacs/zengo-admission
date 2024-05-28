<?php

use App\Http\Controllers\CountyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/counties',CountyController::class);

