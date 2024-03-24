<x-layout bodyClass="g-sidenav-show  bg-gray-200">
  <x-navbars.sidebar activePage="weather-cities"></x-navbars.sidebar>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <x-navbars.navs.auth titlePage="Gerenciar cidades"></x-navbars.navs.auth>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Adicionar cidade</h5>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="alert alert-primary alert-dismissible text-white text-center" role="alert">
                    <span class="text-sm">{{ !$db_found ? 'Verifique se as informações estão corretas e clique em "Confirmar e gravar" para adicionar a nova cidade.' : 'Cidade já cadastrada!' }}</span>
                </div>
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('weather-cities.store') }}" class="d-flex flex-column align-items-center">
                @method('PUT')
                @csrf
                <input type="hidden" name="city_id" value="{{ $city_weather->city_id }}">
                <input type="hidden" name="weather_icon" value="{{ $city_weather->weather_icon }}">

                <div class="form-group col-12 col-md-6">
                  <label for="inputName">Cidade</label>
                  <input type="text" name="name" class="form-control border border-2 p-2" id="inputName" value="{{ $city_weather->name }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputCountry">País</label>
                  <input type="text" name="country" class="form-control border border-2 p-2" id="inputCountry" value="{{ $city_weather->country }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputWeatherDescription">Condição do Tempo</label>
                  <input type="text" name="weather_description" class="form-control border border-2 p-2" id="inputWeatherDescription" value="{{ ucfirst($city_weather->weather_description) }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputTemp">Temperatura Atual (em ºC)</label>
                  <input type="text" name="temp" class="form-control border border-2 p-2" id="inputTemp" value="{{ $city_weather->temp }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputTempMin">Temperatura Mínima (em ºC)</label>
                  <input type="text" name="temp_min" class="form-control border border-2 p-2" id="inputTempMin" value="{{ $city_weather->temp_min }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputTempMax">Temperatura Máxima (em ºC)</label>
                  <input type="text" name="temp_max" class="form-control border border-2 p-2" id="inputTempMax" value="{{ $city_weather->temp_max }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputFeelsLike">Sensação Térmica (em ºC)</label>
                  <input type="text" name="feels_like" class="form-control border border-2 p-2" id="inputFeelsLike" value="{{ $city_weather->feels_like }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>

                <div class="form-group col-12 col-md-6">
                  <label for="inputHumidity">Umidade (em %)</label>
                  <input type="text" name="humidity" class="form-control border border-2 p-2" id="inputHumidity" value="{{ $city_weather->humidity }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                </div>
                @if( !$db_found )
                <button type="submit" class="btn btn-dark mt-3">Confirmar e gravar</button>
                @endif
                <a class="btn bg-gradient-dark mb-0 me-4" href="{{ route('weather-cities.index') }}">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>