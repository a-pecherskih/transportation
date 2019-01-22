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

Route::group(['middleware' => ['web', 'auth']], function() {

	Route::get('/trip_list', 'Common\TripsController@showAllTrips')->name('trips');

	Route::get('/trip/{id}/edit', 'Common\TripsController@edit')->name('trip.edit');

	Route::put('/trip/{id}/update', 'Common\TripsController@update')->name('trip.update');

	Route::post('/trip/get', 'Common\TripsController@getTrip');


	Route::get('/client_list', 'Agent\ClientsController@showAllClients')->name('clients');

	Route::get('/client/create', 'Agent\ClientsController@create')->name('client.create');

	Route::post('/client/store', 'Agent\ClientsController@store')->name('client.store');

	Route::get('/client/{id}/edit', 'Agent\ClientsController@edit')->name('client.edit');

	Route::put('/client/{id}/update', 'Agent\ClientsController@update')->name('client.update');

	Route::delete('/client/{id}/destroy', 'Agent\ClientsController@destroy')->name('client.destroy');

	Route::post('/client/getPassportOrContract', 'Agent\ClientsController@getClientsPassportOrContract');


	Route::get('/contract_list', 'Agent\ContractsController@showAllContracts')->name('contracts');

	Route::get('/contract/create', 'Agent\ContractsController@create')->name('contract.create');

	Route::post('/contract/store', 'Agent\ContractsController@store')->name('contract.store');

	Route::get('/contract/{id}/edit', 'Agent\ContractsController@edit')->name('contract.edit');

	Route::put('/contract/{id}/update', 'Agent\ContractsController@update')->name('contract.update');

	Route::delete('/contract/{id}/destroy', 'Agent\ContractsController@destroy')->name('contract.destroy');

	Route::post('/contract/{id}/archive', 'Agent\ContractsController@archive')->name('contract.archive');

	Route::get('/archive', 'Agent\ContractsController@showArchiveContracts')->name('archive');

	Route::post('/contract/getContractMonthAndYear', 'Agent\ContractsController@getContractMonthAndYear');


	Route::get('/trip/create', 'Common\TripsController@create')->name('trip.create');

	Route::post('/trip/store', 'Common\TripsController@store')->name('trip.store');

	Route::delete('/trip/{id}/destroy', 'Common\TripsController@destroy')->name('trip.destroy');


	Route::get('/points_list', 'Common\PointController@showAllPoints')->name('points');

	Route::get('/point/create', 'Common\PointController@create')->name('point.create');

	Route::post('/point/store', 'Common\PointController@store')->name('point.store');

	Route::delete('/point/{id}/destroy', 'Common\PointController@destroy')->name('point.destroy');


	Route::get('/service_list', 'Common\ServiceController@showAllServices')->name('services');

	Route::get('/service/create', 'Common\ServiceController@create')->name('service.create');

	Route::post('/service/store', 'Common\ServiceController@store')->name('service.store');

	Route::delete('/service/{id}/destroy', 'Common\ServiceController@destroy')->name('service.destroy');


	Route::get('/commission', 'Common\ReportController@getCommission')->name('commission');

	Route::get('/crossreport', 'Common\ReportController@crossReport')->name('report.cross');


	Route::post('/json/change', 'Json@changeStore');

});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
	return view('agent/index');
})->name('home');
