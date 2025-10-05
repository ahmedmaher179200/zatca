<?php

namespace Mohammad\Zatca;

use Illuminate\Support\ServiceProvider;

class ZatcaServicesProveder extends ServiceProvider
{
       public function register()
    {
       //$this->mergeConfig();
         $this->publishConfig();
    }

    public function boot()
    {
        $this->publishConfig();
        $this->publishMigrations();
    }

    private function mergeConfig()
    {
        $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'config');
    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('zatca.php')], 'config');
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/config/zatca.php';
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/database/migrations/';
    }
  
}
