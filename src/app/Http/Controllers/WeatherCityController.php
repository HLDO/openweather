<?php

namespace App\Http\Controllers;

use App\Repository\WeatherRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WeatherCityController extends Controller
{
    public function index() : View
    {
        $city_weather = null;

        return view('pages.weather-city', compact('city_weather'));
    }

    public function search(Request $request) : View
    {
        $city_weather = WeatherRepository::getWeatherByName($request->city_name) ?? false;

        return view('pages.weather-city', compact('city_weather'));
    }
}
