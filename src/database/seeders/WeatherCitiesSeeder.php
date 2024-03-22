<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeatherCities;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Carbon;

class WeatherCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WeatherCities::create([
            'name'                  => 'São Paulo',
            'city_id'               => '3448439',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Rio de Janeiro',
            'city_id'               => '3451190',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Belo Horizonte',
            'city_id'               => '3470127',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Curitiba',
            'city_id'               => '6322752',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Florianópolis',
            'city_id'               => '6323121',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Porto Alegre',
            'city_id'               => '3452925',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Brasília',
            'city_id'               => '3469058',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Goiânia',
            'city_id'               => '3462377',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Recife',
            'city_id'               => '3390760',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Salvador',
            'city_id'               => '3450554',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Manaus',
            'city_id'               => '3663517',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        WeatherCities::create([
            'name'                  => 'Belém',
            'city_id'               => '3405870',
            'weather_description'   => 'Céu limpo',
            'weather_icon'          => '01d',
            'temp'                  => '25',
            'temp_min'              => '20',
            'temp_max'              => '30',
            'feels_like'            => '22',
            'humidity'              => '55',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->subMinutes(60)->format('Y-m-d H:i:s'),
        ]);

        Artisan::call('command:weather_update');
    }
}
