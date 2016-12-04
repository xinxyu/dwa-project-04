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
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

/*
 * Board Routes
 */

// static board deleted page
Route::get('/boards/deleted', function(){return view('boards.deleted');})->name('boards.deleted');

// crud operations
Route::get('/boards', 'BoardController@index')->name('boards.index')->middleware('auth');
Route::get('/boards/create', 'BoardController@create')->name('boards.create')->middleware('auth');
Route::post('/boards', 'BoardController@store')->name('boards.store')->middleware('auth');
Route::get('/boards/{boards}.json', 'BoardController@show')->name('boards.show');
Route::get('/boards/{boards}', 'BoardController@showHTML')->name('boards.showHTML');
Route::delete('/boards/{boards}', 'BoardController@destroy')->name('boards.destroy')->middleware('auth');


/*
 * Note Routes
 */

// crud operations
Route::post('/notes', 'NoteController@store')->name('notes.store');
Route::delete('/notes/{note}', 'NoteController@destroy')->name('notes.destroy');
Route::put('/notes/{note}', 'NoteController@update')->name('notes.update');




