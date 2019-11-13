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
Route::get('/navbar', function () {
    return view('navbar');
});
Route::get('/example', function () {
    return view('example');
});
Route::get('/event', function () {
    return view('event');
});

Route::get('/CGV', function () {
    return view('CGV');
});
Route::get('/event/type', function () {
    return view('eventType');
});
