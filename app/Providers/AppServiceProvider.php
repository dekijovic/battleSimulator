<?php

namespace App\Providers;

use App\Storage\Armies\ArmyRepository;
use App\Storage\Armies\ArmyInterface;
use App\Storage\Games\GameRepository;
use App\Storage\GamesInterface;
use App\Storage\Logs\LogInterface;
use App\Storage\Logs\LogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind (GamesInterface::class, GameRepository::class);
        $this->app->bind (ArmyInterface::class, ArmyRepository::class);
        $this->app->bind (LogInterface::class, LogRepository::class);
    }
}
