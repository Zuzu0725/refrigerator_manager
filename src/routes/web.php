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

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'FoodController@homeIndex')->name('home');
    Route::get('/refrigerator', 'FoodController@refrigeratorIndex')->name('refrigerator');
    Route::get('/vegetable', 'FoodController@vegetableIndex')->name('vegetable');
    Route::get('/freezer', 'FoodController@freezerIndex')->name('freezer');
    Route::get('/create', 'FoodController@create')->name('create');
    Route::post('/store', 'FoodController@store')->name('store');
    Route::get('/edit/{id}', 'FoodController@edit')->name('edit');
    Route::post('/update/{id}', 'FoodController@update')->name('update');
    Route::post('/destroy/{id}', 'FoodController@destroy')->name('destroy');
});
