<?php

namespace App\Providers;

use App\Http\Controllers\Questao2Controller;
use App\Http\Controllers\Questao3Controller;
use App\Models\SeriesTv;
use App\Repositories\Questao3Repository;
use App\Services\Questao2Service;
use App\Services\Questao3Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Binds questao 2
        $this->app->bind(Questao2Interface::class, Questao2Service::class);
        $this->app->bind(Questao2Controller::class, function ($app) {
            return new Questao2Controller($app->make(Questao2Interface::class));
        });

        //Binds questao 3
        $this->app->bind(Questao3Service::class, function ($app) {
            return new Questao3Service($app->make(Questao3Repository::class));
        });
        $this->app->bind(Questao3Repository::class, function ($app) {
            return new Questao3Repository($app->make(Questao3Model::class));
        });
        $this->app->bind(Questao3Model::class, function ($app) {
            return new SeriesTv();
        });

        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
