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

Route::get("/downloadParticipantCSV/{id}", 'DownloadController@downloadCSV');
Route::get("/downloadParticipantPDF/{id}", 'DownloadController@downloadPDF');
Route::get("/download/{id}", 'DownloadController@download');
Route::get("/downloadAll", 'DownloadController@downloadAll');

Route::get("/newEvent", 'creationController@newEvent');
Route::get("/newProduct", 'creationController@newProduct');
Route::post("/newEvent", 'creationController@newEventVerif');
Route::post("/newProduct", 'creationController@newProductVerif');

Route::post('/comment', 'commentPicture');

Route::post('/likePicture', 'likePicture');
Route::post('/dislikePicture', 'dislikePicture');

Route::post('/event/participate', 'participateEvent');
Route::post('/event/deleteEvent', 'deleteEvent');
/*
Route::post('/addEvent', 'addEvent');
*/
Route::post('/event/leave', 'leaveEvent');
Route::post('/editEvent', 'editEvent');


Route::get('/event', function () {
    return view('event');
});

Route::get('/event/{id}', function ($id) {
    return view('eventType', ["id" => $id]);
});

Route::get('/article/{id}', function ($id) {
    return view('article', ["id" => $id]);
});

Route::get('/remove/{id}', 'BasketController@removeFromBasket');
Route::get('/add/{id}', 'BasketController@addInBasket');
Route::get('/amount/{id}', 'BasketController@changeAmountInBasket');
Route::get('/order', 'BasketController@order');

Route::get('/event/{id}/edit', function ($id) {
    return view('eventEdit', ["id" => $id]);
});
Route::get('/CGV', function () {
    return view('CGV');
});
Route::get('/boutique/{id}', function ($id) {
    return view('article', ["id" => $id]);
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
