# SB Admin 2 dashboard with extra login pannel by getting the https://startbootstrap.com/themes/sb-admin-2/

[![Issues](https://img.shields.io/github/issues/sramitroy/guruji-dashboard.svg?style=flat-square)](https://github.com/sramitroy/guruji-dashboard/issues)
[![Stars](	https://img.shields.io/github/issues/sramitroy/guruji-dashboard.svg?style=flat-square)](https://github.com/sramitroy/guruji-dashboard/stargazers)

These are the following steps to be followed up, and after installing this package you to be getting the following stuffs:
 
 #1. merely login & dashboard of the backend of your project where you may make your own pages into your views  aacording to your needs. Here is the screenshot https://prnt.sc/rfhreq
 
 #2. you are to get one helper where you may manage your theme project's logo, and facebook, twitter, Linked, Instagram , Address, and Contact email fields that you to be geeting globally into your project.

 #3. Saperately routes' file called web_admin.php into your routes(folder) so that where youre to manage your backends routes.
 
 #4. And rest of the files, pages, buttons, and form you may get from https://startbootstrap.com/themes/sb-admin-2/
 #5. if you still have any single query while installing and availing the package feel free to leave the annotations here, I will entirely help you
 #6. I still work to serve you my best.

Note: your frontend login will be as laravel provides, roles & permission package to be installed with this dashboard that you may use. And after installing this package, make sure to check and go to the files and folders are:
    #1. resources/views
    #2. routes/web_admin.php(where your admin means backend's routes are available).
    #3. config/constant.php(where your constant get defined for the users' permission).
    #4. Controllers/Admin(where your backend's controllers are available).
    #5. Controllers/Admin/Auth(where your backaend's authenticationss controllers are available).


Step:1, Run the following commands
   
    php artisan make:auth

    composer require guruji/dashboard

    composer require spatie/laravel-permission

    composer require laravelcollective/html

    php artisan vendor:publish --provider="Guruji\Dashboard\DashboardServiceProvider"
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"

if you also want to changes then you can fire bellow command and get config file in config/permission.php.

    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
    



     

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



Step:5, Now open config/app.php file and add service provider and aliase into config/app.php
     

		'providers' => [

			....

		     Guruji\Dashboard\DashboardServiceProvider::class,
			 Spatie\Permission\PermissionServiceProvider::class,
			 Collective\Html\HtmlServiceProvider::class,

		],

		'aliases' => [

			....

			'Form' => Collective\Html\FormFacade::class,
			'Html' => Collective\Html\HtmlFacade::class,

		],

Step:6 Add into app/Http/Kernel.php

		      'web_admin' => [
		            \App\Http\Middleware\EncryptCookies::class,
		            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
		            \Illuminate\Session\Middleware\StartSession::class,
		            // \Illuminate\Session\Middleware\AuthenticateSession::class,
		            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
		            \App\Http\Middleware\VerifyCsrfToken::class,
		            \Illuminate\Routing\Middleware\SubstituteBindings::class,
		        ],


		        ....
			protected $routeMiddleware = [
				....
				'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
				'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
			]
			....

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
			        foreach (glob(app_path() . '/Helpers/*.php') as $file) {
			            require_once($file);
			        }
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

