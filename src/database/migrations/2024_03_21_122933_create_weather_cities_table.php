<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_cities', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->index()->unique()->comment('City ID from OpenWeatherMap');
            $table->string('name')->comment('City name - Ex: Curitiba, BR');
            $table->string('weather_description', 100)->comment('Weather description - Ex: Nublado');
            $table->string('weather_icon', 10)->comment('Icon code from OpenWeatherMap - Ex: 04d');
            $table->integer('temp')->comment('Current temperature');
            $table->integer('temp_min')->comment('Minimum possible temperature');
            $table->integer('temp_max')->comment('Maximum possible temperature');
            $table->integer('feels_like')->comment('Current thermal sensation');
            $table->integer('humidity')->comment('Relative humidity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_cities');
    }
};
