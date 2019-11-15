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
Route::get('/disconnect', function () {
    $session = session('email');
    Session::flush();
    session(['email' => $session]);
    return view('index');
});
Route::get('/validateCookies', function () {
    Cookie::make('accept_cookie', 'true', 60 * 24 * 365);
    return view('index');
});

Route::get('/contactForm', 'contactController@getContact');
Route::post('/contactForm', 'contactController@postContact');

Route::get('/register', 'registerController@gethtml');
Route::get('/login', 'loginController@gethtml');

Route::post('/ConnexionVerif', 'loginController@verification');
Route::post('/InscriptionVerif', 'registerController@verification');
/*Route::get('/header', function () {
    return view('header');
});

*/
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
Route::get('/boutique', function () {
    return view('boutique');
});
Route::get('/event/type', function () {
    return view('eventType');
});
