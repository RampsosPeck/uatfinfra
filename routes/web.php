<?php
use Uatfinfra\ModelAutomotores\Destino;
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

Route::get('/', function () {
	return view('welcome');
});

/*Route::get('admin', function(){

return view('automotive.admin.dashboard');

});*/

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('home/users', 'UsersController@index')->name('home.users.index');

Route::post('impersonations', 'ImpersonationsController@store')->name('impersonations.store');
Route::delete('impersonations', 'ImpersonationsController@destroy')->name('impersonations.destroy');

Route::get('activate/{token}', 'ActivationTokenController@activate')->name('activation');

//Route::group(['prefix' => 'automotives', 'namespace' => 'Automotive'], function(){
//Route::get('posts', 'Admin\PostsController@index');
//});

Route::resource('users', 'UsersController');
Route::resource('reservas', 'Automotive\ReservationController');
Route::resource('vehiculos', 'Automotive\VehiculoController');
Route::resource('destinos', 'Automotive\DestinoController');
Route::resource('viajes', 'Automotive\ViajeController');

/*Rutas para obtener los kilometrajes*/
Route::get('/distancia', function () {

	$cant_id = Input::get('cant_id');
	$id = (int) $cant_id;
	$kilo = Destino::where('id', $id)
		->get(['id', 'kilometraje']);

	return Response::json($kilo);
});

Route::get('/kilometraje', function () {

	$dest_id = Input::get('dest_id');
	$id = (int) $dest_id;
	$kilo = Destino::where('id', $id)
		->get(['id', 'kilometraje']);

	return Response::json($kilo);
});

Route::resource('calendario', 'Automotive\CalendarioController');
//Route::get('events','Automotive\CalendarioController@create');

Route::resource('informes', 'Automotive\InformeController');

Route::resource('solicitudes', 'Solicitud\SolicitudController');

Route::get('informes/{id}/pdf', 'Automotive\InformeController@getImprimir');

Route::resource('roles', 'Automotive\RolController');

Route::get('informes/{id}/aprobar', 'Automotive\InformeController@getAprobar');
Route::get('informes/{id}/observar', 'Automotive\InformeController@getObservar');

Route::resource('mecanicos', 'Mecanico\MecanicoController');
