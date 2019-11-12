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
Route::get('/header', function () {
    return view('headerHandler');
});
Route::get('/sidebar', function () {
    return view('sidebarHandler');
});
Route::get('/event', function () {
    return view('event');

    return view('index');
});
