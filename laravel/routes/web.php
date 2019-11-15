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
Route::get('/contactForm', 'contactController@getContact');
Route::post('/contactForm', 'contactController@postContact');

Route::get('/register', 'registerController@gethtml');
Route::get('/login', 'loginController@gethtml');

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
Route::get('/boutique', function () {
    return view('boutique');
});
Route::get('/event/type', function () {
    return view('eventType');
});
Route::get('/boutique2', function () {
    return view('boutique2');
});