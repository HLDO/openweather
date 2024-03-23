<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use App\Models\WeatherCities;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class WeatherCitiesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Call the index() method from WeatherCitiesController
        $response = $this->get('/weather-cities');

        // Assert that the response
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_can_get_city_data(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create some test cities in the database
        $city = WeatherCities::factory()->create();

        // Get a city name
        $response = $this->get('/weather-cities');

        $response->assertSee($city->name);
    }

    public function test_can_get_single_city(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create some test cities in the database
        $city = WeatherCities::factory()->create();

        // Get a city name by id
        $response = $this->get('/weather-cities/'.$city->id);

        $response->assertSee($city->name)->assertSee($city->city_id)->assertSee($city->weather_description);
    }

    public function test_can_add_city(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create a object
        $city = WeatherCities::factory()->make();

        $payload = $city->toArray();
        $payload['_token'] = csrf_token();

        // Store data
        $this->put('/weather-cities/store', $payload);

        $this->assertEquals(1, WeatherCities::all()->count());
    }

    public function test_can_update_city(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create some test cities in the database
        $city = WeatherCities::factory()->create();
        $city->name = "São Paulo";
        $city->country = "BR";
        $city->city_id = 3448439;

        $payload = $city->toArray();
        $payload['_token'] = csrf_token();

        // Update data by city id
        $this->put('/weather-cities/'.$city->id, $payload);

        $this->assertDatabaseHas('weather_cities',['id'=> $city->id, 'name' => 'São Paulo', 'country' => 'BR', 'city_id' => 3448439]);
    }

    public function test_can_delete_city(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create some test cities in the database
        $city = WeatherCities::factory()->create();

        // Delete city by id
        $this->delete('/weather-cities/'.$city->id);

        $this->assertDatabaseMissing('weather_cities',['id'=> $city->id]);
    }
}