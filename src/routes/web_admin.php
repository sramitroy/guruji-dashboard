<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin','prefix'=>'admin', 'as' => 'admin.'], function(){
	Route::get('/', function(){
		return redirect()->route('admin.login');
	});
	Auth::routes();
});

Route::group(['namespace'=>'Admin','prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'auth:web_admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	Route::resource('profile', 'ProfileController')->only(['index', 'store']);
	Route::resource('settings', 'SettingsController')->only(['index', 'store']);

});