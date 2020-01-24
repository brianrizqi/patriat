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
Route::get('/', 'ExpatriateController@getLogin');
Route::get('/login', 'ExpatriateController@getLogin');
Route::post('/login', 'ExpatriateController@login');
Route::get('/logout', 'ExpatriateController@logout');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/division', 'DivisionController@index')->name('division');
    Route::get('/division/create', 'DivisionController@create')->name('division.create');
    Route::get('/division/edit/{id}', 'DivisionController@edit')->name('division.edit');
    Route::post('/division', 'DivisionController@store')->name('division.store');
    Route::post('/division/{id}/edit', 'DivisionController@update')->name('division.update');
    Route::post('/division/delete', 'DivisionController@destroy')->name('division.destroy');

    Route::get('/place', 'PlaceController@index')->name('place');
    Route::get('/place/create', 'PlaceController@create')->name('place.create');
    Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place.edit');
    Route::post('/place', 'PlaceController@store')->name('place.store');
    Route::post('/place/{id}/edit', 'PlaceController@update')->name('place.update');
    Route::post('/place/delete', 'PlaceController@destroy')->name('place.destroy');

    Route::get('/expatriate', 'ExpatriateController@index')->name('expatriate');
    Route::get('/expatriate/create', 'ExpatriateController@create')->name('expatriate.create');
    Route::get('/expatriate/edit/{id}', 'ExpatriateController@edit')->name('expatriate.edit');
    Route::post('/expatriate', 'ExpatriateController@store')->name('expatriate.store');
    Route::post('/expatriate/{id}/edit', 'ExpatriateController@update')->name('expatriate.update');
    Route::post('/expatriate/delete', 'ExpatriateController@destroy')->name('expatriate.destroy');

    Route::get('/expatriate-details', 'ExpatriateDetailController@index')->name('expatriate-details');
    Route::get('/expatriate-details/create', 'ExpatriateDetailController@create')->name('expatriate-details.create');
    Route::get('/expatriate-details/edit/{id}', 'ExpatriateDetailController@edit')->name('expatriate-details.edit');
    Route::post('/expatriate-details', 'ExpatriateDetailController@store')->name('expatriate-details.store');
    Route::post('/expatriate-details/{id}/edit', 'ExpatriateDetailController@update')->name('expatriate-details.update');
    Route::post('/expatriate-details/delete', 'ExpatriateDetailController@destroy')->name('expatriate-details.destroy');

    Route::get('/division-details', 'DivisionDetailController@index')->name('division-details');
    Route::get('/division-details/create', 'DivisionDetailController@create')->name('division-details.create');
    Route::get('/division-details/edit/{id}', 'DivisionDetailController@edit')->name('division-details.edit');
    Route::post('/division-details', 'DivisionDetailController@store')->name('division-details.store');
    Route::post('/division-details/{id}/edit', 'DivisionDetailController@update')->name('division-details.update');
    Route::post('/division-details/delete', 'DivisionDetailController@destroy')->name('division-details.destroy');

    Route::get('/scheduling', 'SchedulingController@index')->name('scheduling');
    Route::get('/scheduling/show', 'SchedulingController@show')->name('scheduling.show');
    Route::get('/scheduling/show/{id}', 'SchedulingController@showExpatriate')->name('scheduling.show.expatriate');
    Route::post('/scheduling', 'SchedulingController@store');

    Route::get('/periode', 'PeriodeController@index')->name('periode');
    Route::get('/periode/create', 'PeriodeController@create')->name('periode.create');
//    Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place.edit');
    Route::post('/periode', 'PeriodeController@store')->name('periode.store');
//    Route::post('/place/{id}/edit', 'PlaceController@update')->name('place.update');
//    Route::post('/place/delete', 'PlaceController@destroy')->name('place.destroy');
});

Route::group(['prefix' => 'member'], function () {
    Route::get('/index', 'MemberController@index')->name('member.index');
});
