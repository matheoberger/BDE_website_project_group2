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

Route::get('/event', function () {
    return view('event');
});
Route::get('/event/{id}', function ($id) {
    return view('eventType', ["id"=>$id]);
});
Route::get('/CGV', function () {
    return view('CGV');
});
Route::get('/article/{id}', function ($id) {
    return view('article', ["id"=>$id]);
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
Route::get('/boutique2', function () {
    return view('boutique2');
});