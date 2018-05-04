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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*api v1 */
Route::prefix('api/travel/v1')->group(function(){
	Route::resource('room','Api\RoomController');//done
	Route::resource('sob','Api\SobController');//done
	Route::resource('reservation','Api\ReservationController');//done
	Route::resource('property','Api\PropertyController');
	Route::resource('res_room','Api\ResRoomController');
	Route::resource('payment','Api\PaymentController');
	Route::resource('folio','Api\FolioController');


	Route::get('dashboard','Api\DashboardController@index');
	Route::get('report/{m}/{type}','Api\DashboardController@report');
	Route::get('calender/{ci}/{co}','Api\DashboardController@calender');
});


/* end api*/
Route::get('/home', 'HomeController@index')->name('home');

