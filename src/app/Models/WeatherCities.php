<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherCities extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather_cities';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'name',
        'country',
        'weather_description',
        'weather_icon',
        'temp',
        'temp_min',
        'temp_max',
        'feels_like',
        'humidity',
        'created_at',
        'updated_at'
    ];

    /**
     * Campos do tipo Date da tabela
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}