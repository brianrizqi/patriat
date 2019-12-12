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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');


Route::get('/division', 'DivisionController@index')->name('division');
Route::get('/division/create', 'DivisionController@create')->name('division.create');
Route::get('/division/edit/{id}', 'DivisionController@edit')->name('division.edit');
Route::post('/division', 'DivisionController@store')->name('division.store');
Route::post('/division/{id}/edit', 'DivisionController@update')->name('division.update');
Route::get('/division/delete/{id}', 'DivisionController@destroy')->name('division.delete');

Route::get('/place', 'PlaceController@index')->name('place');
Route::get('/place/create', 'PlaceController@create')->name('place.create');
Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place.edit');
Route::post('/place', 'PlaceController@store')->name('place.store');
Route::post('/place/{id}/edit', 'PlaceController@update')->name('place.update');

Route::get('/expatriate', 'ExpatriateController@index')->name('expatriate');
Route::get('/expatriate/create', 'ExpatriateController@create')->name('expatriate.create');
Route::get('/expatriate/edit/{id}', 'ExpatriateController@edit')->name('expatriate.edit');
Route::post('/expatriate', 'ExpatriateController@store')->name('expatriate.store');
Route::post('/expatriate/{id}/edit', 'ExpatriateController@update')->name('expatriate.update');

Route::get('/expatriate-details', 'ExpatriateDetailController@index')->name('expatriate-details');
Route::get('/expatriate-details/create', 'ExpatriateDetailController@create')->name('expatriate-details.create');
Route::get('/expatriate-details/edit/{id}', 'ExpatriateDetailController@edit')->name('expatriate-details.edit');
Route::post('/expatriate-details', 'ExpatriateDetailController@store')->name('expatriate-details.store');
Route::post('/expatriate-details/{id}/edit', 'ExpatriateDetailController@update')->name('expatriate-details.update');

Route::get('/scheduling', 'SchedulingController@index')->name('scheduling');
