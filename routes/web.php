<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('pages/home');
});

/*
 * Authentication Routes
 */
Route::get('/login', function () {
    return "Login Page";
});

Route::get('/logout', function () {
    return "Logout Page";
});

/*
 * Board Routes
 */
Route::get('/boards/create', 'BoardController@create')->name('boards.create');
Route::post('/boards/store', 'BoardController@store')->name('boards.store');
Route::get('/boards/{boards}.json', 'BoardController@show')->name('boards.show');
Route::get('/boards/{boards}', 'BoardController@showHTML')->name('boards.showHTML');

/*
 * Note Routes
 */

Route::post('/notes/store.json', 'NoteController@store')->name('notes.store');
Route::post('/notes/destroy/{note}', 'NoteController@destroy')->name('notes.store');





