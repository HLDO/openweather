<?php

namespace App\Http\Controllers;

use App\Models\WeatherCities;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve cities list
        $cities = WeatherCities::all();

        return view('dashboard.index', compact('cities'));
    }
}
