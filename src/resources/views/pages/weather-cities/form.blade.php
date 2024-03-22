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
              <h5 class="mb-0">Editar cidade</h5>
            </div>
            <div class="col-12 text-end">
              <a class="btn bg-gradient-dark mb-0 me-4" href="{{ route('weather-cities.index') }}">Voltar</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('weather-cities.update', $city) }}" class="d-flex flex-column align-items-center">
                @method('PUT')
                @csrf

                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputName">Cidade</label>
                  <input type="text" name="name" class="form-control border border-2 p-2" id="inputName" value="{{ $city->name }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('city_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputCityId">ID OpenWeatherMap</label>
                  <input type="text" inputmode="numeric" pattern="\d*" name="city_id" class="form-control border border-2 p-2" id="inputCityId" value="{{ $city->city_id }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('weather_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputWeatherDescription">Condição do Tempo</label>
                  <input type="text" name="weather_description" class="form-control border border-2 p-2" id="inputWeatherDescription" value="{{ $city->weather_description }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('weather_icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputWeatherIcon">Ícone do Tempo</label>
                  <input type="text" name="weather_icon" class="form-control border border-2 p-2" id="inputWeatherIcon" value="{{ $city->weather_icon }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('temp')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputTemp">Temperatura Atual</label>
                  <input type="number" min="-100" max="100" name="temp" class="form-control border border-2 p-2" id="inputTemp" value="{{ $city->temp }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('temp_min')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputTempMin">Temperatura Mínima</label>
                  <input type="number" min="-100" max="100" name="temp_min" class="form-control border border-2 p-2" id="inputTempMin" value="{{ $city->temp_min }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('temp_max')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputTempMax">Temperatura Máxima</label>
                  <input type="number" min="-100" max="100" name="temp_max" class="form-control border border-2 p-2" id="inputTempMax" value="{{ $city->temp_max }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('feels_like')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputFeelsLike">Sensação Térmica</label>
                  <input type="number" min="-100" max="100" name="feels_like" class="form-control border border-2 p-2" id="inputFeelsLike" value="{{ $city->feels_like }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>

                @error('humidity')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <div class="form-group col-12 col-md-6">
                  <label for="inputHumidity">Umidade</label>
                  <input type="number" min="0" max="100" name="humidity" class="form-control border border-2 p-2" id="inputHumidity" value="{{ $city->humidity }}" onfocus="focused(this)" onfocusout="defocused(this)" required>
                </div>
                <button type="submit" class="btn btn-dark mt-3">Atualizar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>