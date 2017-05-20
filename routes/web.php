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
//    return view('search');
//});

Route::get('demo', function () {
    return view('demo');
});

Route::get('checkin/new', 'AKFGolfController@create');
Route::resource('/', 'AKFGolfController');

Route::resource('sponsors', 'SponsorController');
Route::resource('companies', 'CompanyController');

Route::get('players/signature', 'PlayerController@saveSignature');
Route::resource('players', 'PlayerController');
Route::resource('teams', 'TeamController');