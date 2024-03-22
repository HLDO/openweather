<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="weather-city"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Previsão em sua cidade"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
            @if ($city_weather !== null && $city_weather !== false)
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ $city_weather->name }}, {{ strtoupper
($city_weather->country) }}</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">

                                <div class="col-lg-8 col-md-11 ps-md-5 mb-5 mb-md-0 mx-auto">
                                    <div class="d-flex">
                                        <div class="me-auto">
                                            <h1 class="display-1 font-weight-bold mt-n3 mb-0">{{ $city_weather->temp }}º</h1>
                                            <h6 class="text-uppercase mb-0 ms-1">{{ $city_weather->weather_description }}</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <img class="w-80 float-end mt-n6 mt-lg-n4"
                                                src="https://openweathermap.org/img/wn/{{ $city_weather->weather_icon }}@4x.png" alt="Nublado">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-10 col-md-6 mx-auto">
                                            <div class="card move-on-hover overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <h6 class="mb-0 me-3">Mínima</h6>
                                                        <h6 class="mb-0">{{ $city_weather->temp_min }}º</h6>
                                                    </div>
                                                    <hr class="horizontal dark">
                                                    <div class="d-flex">
                                                        <h6 class="mb-0 me-3">Máxima</h6>
                                                        <h6 class="mb-0">{{ $city_weather->temp_max }}º</h6>
                                                    </div>
                                                    <hr class="horizontal dark">
                                                    <div class="d-flex">
                                                        <h6 class="mb-0 me-3">Sensação Térmica</h6>
                                                        <h6 class="mb-0">{{ $city_weather->feels_like }}º</h6>
                                                    </div>
                                                    <hr class="horizontal dark">
                                                    <div class="d-flex">
                                                        <h6 class="mb-0 me-3">Humidade</h6>
                                                        <h6 class="mb-0">{{ $city_weather->humidity }}%</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                </div>
            @elseif ($city_weather === false)
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Aviso</h5>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div class="alert alert-primary alert-dismissible text-white text-center" role="alert">
                                <span class="text-sm">A previsão do tempo para a cidade informada não pôde ser identificada.</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Informação</h5>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div class="alert alert-info alert-dismissible text-white" role="alert">
                                <span class="text-sm">Informe o nome de uma cidade na caixa de pesquisa acima para receber a previsão do tempo.</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </main>

</x-layout>
