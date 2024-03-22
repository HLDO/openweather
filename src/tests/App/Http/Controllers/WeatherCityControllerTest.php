<?php

namespace Tests\App\Http\Controllers;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Http\Response;

class WeatherCityControllerTest extends TestCase
{
    public function test_index(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Call the index() method from WeatherCityController
        $response = $this->get('/weather-city');

        // Assert that the response
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_search(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        $response = $this->put('/weather-city/search', ['city_name' => 'Curitiba, BR', '_token' => csrf_token()]);

        // Assert that the response
        $response->assertStatus(Response::HTTP_OK);
    }
}