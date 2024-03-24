<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WeatherCitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'country'               => 'required|string|min:2|max:2',
            'city_id'               => 'required|integer',
            'weather_description'   => 'required|string|max:100',
            'weather_icon'          => 'required|string|max:10',
            'temp'                  => 'required|integer',
            'temp_min'              => 'required|integer',
            'temp_max'              => 'required|integer|gte:temp_min',
            'feels_like'            => 'required|integer',
            'humidity'              => 'required|integer|min:0|max:100'
        ];
    }
}
