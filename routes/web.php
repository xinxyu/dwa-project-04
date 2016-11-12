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



Route::get('/boards/{board}', function ($board) {
    $title=$board;
    $section1 = "what went well";
    $section2 = "what needs improvement";
    $section3 = "action items";
    $section4 = "other";
    return view('/board/show')->with([
        "title" =>$title,
        "section1"=>$section1,
        "section2"=>$section2,
        "section3"=>$section3,
        "section4"=>$section4
    ]);
})->name('boards.show');

Route::get('/boards/create', function () {
    return view('/board/create');
})->name('boards.create');

Route::get('/login', function () {
    return "Login Page";
});

Route::get('/logout', function () {
    return "Logout Page";
});

