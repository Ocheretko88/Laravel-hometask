<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Command\Command as CommandAlias;

class FetchWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get information about the weather';

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
     * @return int
     */
    public function handle()
    {
        $weather = HTTP::get('https://api.openweathermap.org/data/2.5/weather?q={Kyiv}&appid={39484f146311ea41004e946f87678f9f}');
        $this->info($weather);
        Route::get('/weather', function(){
            return $weather;
        });
        return CommandAlias::SUCCESS;
    }
}
