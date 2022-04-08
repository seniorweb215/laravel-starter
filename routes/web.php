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

Route::group(['middleware' => ['auth', 'user.check:teacher']], function() {
    Route::get('/teacher', function () {
        echo 'I am teacher';
    })->name('dashboard');
});

Route::group(['middleware' => ['auth', 'user.check:student']], function() {
    Route::get('/student', function () {
        echo 'I am student';
    })->name('dashboard');
});

require __DIR__.'/auth.php';
