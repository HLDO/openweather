<?php

namespace App\Console\Commands;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

use App\Models\WeatherCities;
use App\Repository\WeatherRepository;

class UpdateWeatherCitiesCommand extends Command implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "command:weather_update {--cityid=} {--force=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando atualizar as informações climaticas das cidades cadastradas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment("Início: " . date('Y-m-d H:i:s').PHP_EOL);

        $force = (bool)$this->option('force') ?? false;

        if( $this->option('cityid') !== null )
        {
            try
            {
                $city = WeatherCities::where('city_id', trim($this->option('cityid')))->first() ?? null;
                if( $city !== null )
                {
                    $city_weather = (array)WeatherRepository::getWeatherById($city->city_id);
                    $city_weather['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
                    $city->update($city_weather);
                    $this->comment("Clima para a cidade ID '".$city->city_id."' (".$city->name.") atualizado");
                }
            }
            catch (\Exception $e)
            {
                $this->comment("Erro ao atualizar clima para a cidade ID '".$city->city_id."'. Erro: ".$e->getMessage());
            }
        }
        else
        {
            try
            {
                $cities = WeatherCities::where(function($q) use ($force)
                                        {
                                            // if !force = false, only considers cities last updated more than 30 minutes ago
                                            if( !$force )
                                            {
                                                $q->where('updated_at', '<=', Carbon::now()->subMinutes(30)->toDateTimeString());
                                            }
                                        })
                                        ->get();
                foreach( $cities as $city )
                {
                    $city_weather = (array)WeatherRepository::getWeatherById($city->city_id);
                    $city_weather['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
                    $city->update($city_weather);
                    $this->comment("Clima para a cidade ID '".$city->city_id."' (".$city->name.") atualizado");
                }
            }
            catch (\Exception $e)
            {
                $this->comment("Erro ao atualizar climas. Erro: ".$e->getMessage());
            }
        }

        $this->comment(PHP_EOL."Término: " . date('Y-m-d H:i:s'));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('cityid', InputOption::VALUE_OPTIONAL, 'Atualiza apenas o clima da cidade informada pelo seu ID OpenWeatherMap'),
            array('force', InputOption::VALUE_OPTIONAL, 'Força a atualização climaticas'),
        );
    }
}