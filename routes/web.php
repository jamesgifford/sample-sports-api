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

Route::get('/home', 'Ui\HomeController@index')->name('home');
Route::get('/teams/{team}', 'Ui\TeamController@show')->name('teams');
Route::get('/teams', 'Ui\TeamController@index')->name('teams');
Route::get('/players', 'Ui\PlayerController@index')->name('players');
