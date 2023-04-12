<?php

use Illuminate\Support\Facades\Route;

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
    return view('start');
});

Route::get('/ambulante-pflege', function () {
    return view('ambulante-pflege');
});

Route::get('/tagespflege', function () {
    return view('tagespflege');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/presse', function () {
    return view('presse');
});

Route::get('/impressum', function () {
    return view('impressum');
});

Route::get('/datenschutz', function () {
    return view('datenschutz');
});

Route::get('/karriere', function () {
    return view('karriere');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/bewerbung', function () {
    return redirect('/karriere');
});