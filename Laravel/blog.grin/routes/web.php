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

Route::get('/welcome', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('layout.site');
});


//all pages

Route::get('/one', function () {
    return view('pages.one');
});


Route::get('/two1', function () {
    return view('pages.two1');
});


Route::get('/two2', function () {
    return view('pages.two2');
});


Route::get('/three', 'HomeController@IndexOne' );

