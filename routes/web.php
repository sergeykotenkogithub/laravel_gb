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
    return view('welcome');
});

// Отображается приветствие по имени в зависимости от url

Route::get('/name/{name}', function (string $name) {
    return "Hello, {$name}";
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/article', function () {
    return view('article');
});
