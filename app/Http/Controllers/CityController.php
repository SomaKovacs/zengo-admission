<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public static function getCitiesById(int $id)
    {
        dd(DB::table('cities')->where('county_id', '=', $id)->get()->all());
        return DB::table('cities')->where('county_id', '=', $id)->get()->all();
    }
}
