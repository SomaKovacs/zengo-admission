<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\JsonResponse;

class CountyController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(County::orderBy('name')->get());
    }
}
