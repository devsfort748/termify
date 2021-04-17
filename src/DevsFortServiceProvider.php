<?php
namespace DevsFort\Backup;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;



class DevsFortServiceProvider extends ServiceProvider{

    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton(CommandLine::class,function(){
            return new CommandLine();
        });
        $this->registerRoutes();
        $this->commands([
            CommandLineBackup::class
        ]);


    }
    protected function registerRoutes()
    {
        Route::group($this->routesConfig(),function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/lister.php');
        });
    }

    protected function routesConfig(){
        return[
            'prefix' => 'backup'
        ];
    }


}
