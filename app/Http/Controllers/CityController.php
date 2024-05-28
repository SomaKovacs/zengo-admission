<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityPostRequest;
use App\Models\City;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    public function getCitiesByCountyId(int $id): JsonResponse
    {
        return response()->json(City::all()->where('county_id', $id)->toArray());
    }

    public function deleteCity(City $city): JsonResponse
    {
        DB::beginTransaction();
        try {
            if (!$city->delete()) {
                throw new Exception("Failed to delete city from database");
            }

            DB::commit();
            return response()->json(['message' => 'City successfully deleted from database.'], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Failed to delete city. {$exception->getMessage()}");
            return response()->json(['message' => $exception->getMessage()], 500);
        }

    }

    public function modifyCity(City $city, Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $city->name = $request->post("name");

            if (!$city->save()) {
                throw new Exception("Failed to save modified city to database");
            }

            DB::commit();
            return response()->json(['message' => 'City successfully saved.'], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Failed to modify city. {$exception->getMessage()}");
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function addCityToCounty(CityPostRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            if (!$request->validated()) {
                throw new Exception("Validation failed on city add.");
            }

            $name = $request->post("name");
            $county_id = $request->post("county_id");

            $city = new City();
            $city->name = $name;
            $city->county_id = $county_id;

            if (!$city->save()) {
                throw new Exception("Failed to save city.");
            }

            DB::commit();
            return response()->json($city);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Failed to create city. {$exception->getMessage()}", [__METHOD__]);
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
