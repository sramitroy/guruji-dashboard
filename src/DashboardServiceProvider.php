<?php


namespace Guruji\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
	
	public function boot()
    {
        
// to publish the filse & floders
        $this->publishes([
        __DIR__.'/resources/views' => resource_path('views'),
        __DIR__.'/public/' => public_path(''),
        __DIR__.'/Http/Controllers' => app_path('Http/Controllers'),
        __DIR__.'/Helpers' => app_path('Helpers'),
        __DIR__.'/Providers' => app_path('Providers'),
        __DIR__.'/Models' => app_path(''),
        __DIR__.'/database/migrations' => base_path('database/migrations'),
        __DIR__.'/database/seeds' => base_path('database/seeds'),
        __DIR__.'/config' => base_path('config'),
        __DIR__.'/routes' => base_path('routes'),
     
      ]);
    }

    public function register()
    {
          	
    }     
}