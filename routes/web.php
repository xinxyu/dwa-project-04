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

// static board deleted page
Route::get('/boards/deleted', function(){return view('boards.deleted');})->name('boards.deleted');

// crud operations
Route::get('/boards/create', 'BoardController@create')->name('boards.create');
Route::post('/boards', 'BoardController@store')->name('boards.store');
Route::get('/boards/{boards}.json', 'BoardController@show')->name('boards.show');
Route::get('/boards/{boards}', 'BoardController@showHTML')->name('boards.showHTML');
Route::delete('/boards/{boards}', 'BoardController@destroy')->name('boards.destroy');


/*
 * Note Routes
 */

// crud operations
Route::post('/notes', 'NoteController@store')->name('notes.store');
Route::delete('/notes/{note}', 'NoteController@destroy')->name('notes.destroy');
Route::put('/notes/{note}', 'NoteController@update')->name('notes.update');





