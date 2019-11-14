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

Route::post('/Connexion/verif', 'loginController@verification');
Route::post('/Inscription/verif', 'loginController@verification');
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
});
Route::get('/CGV', function () {
    return view('CGV');
});
