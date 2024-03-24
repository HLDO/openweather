<?php

namespace App\Http\Controllers;

use App\Repository\WeatherRepository;
use App\Models\WeatherCities;
use App\Traits\Funcoes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;

class WeatherCityController extends Controller
{
    use Funcoes;

    public function index() : View
    {
        $city_weather = null;

        return view('pages.weather-city', compact('city_weather'));
    }

    public function search(Request $request) : View
    {
        $city_weather = $db_found = false;

        if( !empty($request->city_name) )
        {
            // Check if key exists on Redis
            if( Redis::exists($this->convert_str($request->city_name)) )
            {
                // Get city weather from Redis cache
                $city_weather = json_decode(Redis::get($this->convert_str($request->city_name)));
            }
            else
            {
                // Get city weather from OpenWeather API
                $city_weather = WeatherRepository::getWeatherByName($request->city_name) ?? false;
                if( $city_weather !== false )
                {
                    // Store in Redis for 30 minutes (1800 seconds)
                    Redis::set($this->convert_str($request->city_name), json_encode($city_weather), 'EX', 1800);
                }
            }

            if( $city_weather !== false)
            {
                $db_found = WeatherCities::where('city_id', '=', $city_weather->city_id)->exists();
            }
        }

        return view('pages.weather-city', compact('city_weather', 'db_found'));
    }
}
