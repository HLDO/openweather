<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use App\Models\WeatherCities;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        // Fake user to authenticate
        $user = new User(array('name' => 'LogComex'));
        $this->be($user); // Authenticated

        // Create some test cities in the database
        WeatherCities::factory()->count(3)->create();

        // Call the index() method from DashboardController
        $response = $this->get('/dashboard');

        // Assert that the response
        $response->assertStatus(Response::HTTP_OK);
    }
}