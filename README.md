# subadmin theme dashboard

[![Issues](https://img.shields.io/github/issues/sramitroy/guruji-dashboard.svg?style=flat-square)](https://github.com/sramitroy/guruji-dashboard/issues)
[![Stars](	https://img.shields.io/github/issues/sramitroy/guruji-dashboard.svg?style=flat-square)](https://github.com/sramitroy/guruji-dashboard/stargazers)

These are the following steps to be followed up

Step:1, Run the following commands
   
    php artisan make:auth

    composer require guruji/dashboard

    composer require spatie/laravel-permission

    composer require laravelcollective/html

    php artisan vendor:publish --provider="Guruji\Dashboard\DashboardServiceProvider"

     

Step:2, Add into config/auth.php
   
   'web_admin' => [
            'driver' => 'session',
            'provider' => 'users',
        ],


Step:3, Add into User.php model
   
      use Spatie\Permission\Traits\HasRoles;

      use  HasRoles;


Step:4, Add into users_table
    
    use Spatie\Permission\Models\Role;



Step:5, Add into config/app.php
     

		'providers' => [

			....

		     Guruji\Dashboard\DashboardServiceProvider::class,
			 App\Providers\HelperServiceProvider::class,
			 Spatie\Permission\PermissionServiceProvider::class,
			 Collective\Html\HtmlServiceProvider::class,

		],

		'aliases' => [

			....

			'Form' => Collective\Html\FormFacade::class,
			'Html' => Collective\Html\HtmlFacade::class,

		],

Step:6 Add into Kernel.php

		      'web_admin' => [
		            \App\Http\Middleware\EncryptCookies::class,
		            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
		            \Illuminate\Session\Middleware\StartSession::class,
		            // \Illuminate\Session\Middleware\AuthenticateSession::class,
		            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
		            \App\Http\Middleware\VerifyCsrfToken::class,
		            \Illuminate\Routing\Middleware\SubstituteBindings::class,
		        ],

Step:7 Add into RoutServiceProvider.php



			     public function map()
			    {
			        
			        $this->mapWebAdminRoutes();

			       
			    }



			      protected function mapWebAdminRoutes()
			    {
			        Route::middleware('web_admin')
			             ->namespace($this->namespace)
			             ->group(base_path('routes/web_admin.php'));
			    }


Step:8 Run

    php artisan migrate
    php artisan db:seed --class=AdminSeeder



Step:9, And, here we go!


      http://localhost/..your_project.../password/reset
      http://localhost/..your_project.../admin/login

         id: uamitroy@gmail.com
         password: password 


## it will give you the basic sub admin them dashboard 

