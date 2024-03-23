<?php


namespace App\Repository;
use GuzzleHttp\Client;


use Exception;

class WeatherRepository
{

    public static function getWeatherByName($city_name)
    {
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = env('OPENWEATHER_API_URL') . "&q=".$city_name."&appid=" . env('OPENWEATHER_API_KEY');

        try
        {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            if( $data !== null )
            {
                $data = [
                    'city_id' => $data['id'],
                    'name' => $data['name'],
                    'country' => $data['sys']['country'],
                    'weather_description' => $data['weather'][0]['description'],
                    'weather_icon' => $data['weather'][0]['icon'],
                    'temp' => round($data['main']['temp']),
                    'temp_min' => round($data['main']['temp_min'], 0, PHP_ROUND_HALF_DOWN),
                    'temp_max' => round($data['main']['temp_max'], 0, PHP_ROUND_HALF_UP),
                    'feels_like' => round($data['main']['feels_like']),
                    'humidity' => $data['main']['humidity'],
                ];
            }

            return json_decode(json_encode($data), false);
        }
        catch (\Exception $e)
        {
            // Handle any errors that occur during the API request
            new Exception($e->getMessage(), $e->getCode());
        }
    }

    public static function getWeatherById($city_id)
    {
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = env('OPENWEATHER_API_URL') . "&id=".$city_id."&appid=" . env('OPENWEATHER_API_KEY');

        try
        {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            if( $data !== null )
            {
                $data = [
                    'city_id' => $data['id'],
                    'name' => $data['name'],
                    'country' => $data['sys']['country'],
                    'weather_description' => $data['weather'][0]['description'],
                    'weather_icon' => $data['weather'][0]['icon'],
                    'temp' => round($data['main']['temp']),
                    'temp_min' => round($data['main']['temp_min'], 0, PHP_ROUND_HALF_DOWN),
                    'temp_max' => round($data['main']['temp_max'], 0, PHP_ROUND_HALF_UP),
                    'feels_like' => round($data['main']['feels_like']),
                    'humidity' => $data['main']['humidity'],
                ];
            }

            return json_decode(json_encode($data), false);
        }
        catch (\Exception $e)
        {
            // Handle any errors that occur during the API request
            new Exception($e->getMessage(), $e->getCode());
        }
    }
}