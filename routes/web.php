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

/*Route::group([
    'middleware' => ['cors']
], function () {*/
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home/get-json', 'HomeController@getJSON');
    Route::get('/home/data-chart', 'HomeController@chartData');
    Route::get('/home/random-chart', 'HomeController@chartRandom');
    Route::get('/home/socket-chart', 'HomeController@newEvent');

    Route::get('/home/laravel-views', 'HomeController@laravelViews');
/*});*/


