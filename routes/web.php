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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/division', 'DivisionController@index')->name('division');
Route::get('/division/create', 'DivisionController@create')->name('division.create');
Route::post('/division', 'DivisionController@store')->name('division.store');

Route::get('/place', 'PlaceController@index')->name('place');
Route::get('/place/create', 'PlaceController@create')->name('place.create');
Route::post('/place', 'PlaceController@store')->name('place.store');

Route::get('/expatriate', 'ExpatriateController@index')->name('expatriate');
Route::get('/expatriate/create', 'ExpatriateController@create')->name('expatriate.create');
Route::post('/expatriate', 'ExpatriateController@store')->name('expatriate.store');
