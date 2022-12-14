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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/titles.search', function () {
        return view('titles.search');
    })->name('titles.search');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('titles', \App\Http\Controllers\TitleController::class);
    Route::resource('users', \App\Http\Controllers\UsersController::class);

});
