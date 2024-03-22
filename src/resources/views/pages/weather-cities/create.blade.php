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
            <div class="col-12 text-end">
              <a class="btn bg-gradient-dark mb-0 me-4" href="{{ route('weather-cities.index') }}">Voltar</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('weather-cities.create_confirm') }}" class="d-flex flex-column align-items-center">
                @method('PUT')
                @csrf
                <div class="form-group col-12 col-md-6">
                  <label for="inputCity">Cidade</label>
                  <input type="text" name="city" class="form-control border border-2 p-2" id="inputCity" placeholder="Ex: Curitiba, BR" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <button type="submit" class="btn btn-dark mt-3">Adicionar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>