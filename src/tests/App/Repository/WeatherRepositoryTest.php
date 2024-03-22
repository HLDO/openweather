<?php

namespace Tests\App\Repository;

use Tests\TestCase;
use App\Models\WeatherCities;
use App\Models\User;
use App\Repository\WeatherRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class WeatherRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_getWeatherByName(): void
    {
        // Check if result is OK by city name
        $repository = new WeatherRepository();
        $city_weather = $repository->getWeatherByName('Curitiba, BR');

        $this->assertEquals('Curitiba', $city_weather->name);
    }

    public function test_getWeatherById(): void
    {
        // Check if result is OK by OpenWeatherMap city ID
        $repository = new WeatherRepository();
        $city_weather = $repository->getWeatherById(6322752);

        $this->assertEquals('Curitiba', $city_weather->name);
    }
}