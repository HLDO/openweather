<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherCityController;
use App\Http\Controllers\WeatherCitiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/weather-city', [WeatherCityController::class, 'index'])->name('weather-city.index');
	Route::put('/weather-city/search', [WeatherCityController::class, 'search'])->name('weather-city.search');

    Route::get('/weather-cities', [WeatherCitiesController::class, 'index'])->name('weather-cities.index');
    Route::get('/weather-cities/create', [WeatherCitiesController::class, 'create'])->name('weather-cities.create');
    Route::put('/weather-cities/create_confirm', [WeatherCitiesController::class, 'create_confirm'])->name('weather-cities.create_confirm');
    Route::put('/weather-cities/store', [WeatherCitiesController::class, 'store'])->name('weather-cities.store');
    // Route::get('weather-cities/{id}', [WeatherCitiesController::class, 'show'])->name('weather-cities.show');
    Route::get('/weather-cities/{city}', [WeatherCitiesController::class, 'edit'])->name('weather-cities.edit');
    Route::put('/weather-cities/{city}', [WeatherCitiesController::class, 'update'])->name('weather-cities.update');
    Route::delete('/weather-cities/{city}', [WeatherCitiesController::class, 'destroy'])->name('weather-cities.destroy');
});