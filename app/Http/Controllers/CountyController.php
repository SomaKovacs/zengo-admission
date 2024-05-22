<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\View\View;

class CountyController extends Controller
{
    public function __invoke(): View
    {
        $counties = County::all();

        return view('main', ['counties' => $counties]);
    }
}
