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
    return view('index');
});
/*Route::get('/header', function () {
    return view('header');
});
*/
Route::get('/navbar', function () {
    return view('navbar');
});/*
Route::get('/footer', function () {
    return view('footer');
});*/
Route::get('/example', function () {
    return view('example');
});
Route::get('/event', function () {
    return view('event');

    return view('index');
});
Route::get('/CGV', function () {
    return view('CGV');
});
Route::get('/mentionsLegales', function () {
    return view('mentionsLegales');
});
Route::get('/CGU', function () {
    return view('CGU');
});
Route::get('/CGcookies', function () {
    return view('CGcookies');
});
Route::get('/CGRDP', function () {
    return view('CGRDP');
});
Route::get('/panier', function () {
    return view('panier');
});