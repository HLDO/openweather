<?php

namespace App\Http\Controllers;

use App\Models\WeatherCities;
use App\Http\Requests\WeatherCitiesRequest;
use App\Repository\WeatherRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WeatherCitiesController extends Controller
{
    public function index() : View
    {
        // Retrieve cities list
        $cities = WeatherCities::all();

        return view('pages.weather-cities.list', compact('cities'));
    }

    public function create() : View
    {
        return view('pages.weather-cities.create');
    }

    public function create_confirm(Request $request) : View
    {
        $city_weather = WeatherRepository::getWeatherByName($request->city);
        $db_found = WeatherCities::where('city_id', '=', $city_weather->city_id)->exists();

        return view('pages.weather-cities.create_confirm', compact('city_weather', 'db_found'));

    }

    public function store(Request $request) : RedirectResponse
    {
        try
        {
            WeatherCities::create($request->all());
            return redirect()->route('weather-cities.index')->with('success', 'Cidade cadastrada com sucesso!');
        }
        catch (\Exception $e)
        {
            return redirect()->route('weather-cities.index')->with('danger', 'Não foi possivel cadastrar a cidade! Erro: '.$e->getMessage());
        }

    }

    public function edit(WeatherCities $city) : View
    {
        return view('pages.weather-cities.form', compact('city'));
    }

    public function update(WeatherCitiesRequest $request, WeatherCities $city) : RedirectResponse
    {
        try
        {
            // If validated, update in database
            $city->update($request->validated());
            return redirect()->route('weather-cities.index')->with('success', 'Cidade atualizada com sucesso!');
        }
        catch (\Exception $e)
        {
            return redirect()->route('weather-cities.index')->with('danger', 'Não foi possivel atualizar a cidade! Erro: '.$e->getMessage());
        }
    }

    public function destroy(Request $request, WeatherCities $city) : RedirectResponse
    {
        try
        {
            $city->delete();
            return redirect()->route('weather-cities.index')->with('success', 'Cidade removida com sucesso!');
        }
        catch (\Exception $e)
        {
            return redirect()->route('weather-cities.index')->with('danger', 'Não foi possivel remover a cidade! Erro: '.$e->getMessage());
        }
    }

}
