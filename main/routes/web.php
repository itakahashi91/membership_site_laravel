<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => true,
    'reset' => true,
    'verify' => true,
]);

Route::middleware('auth:user')->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Auth::routes([
        'register' => true,
        'reset' => true,
        'verify' => true,
    ]);
    Route::middleware('auth:admin')->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
    });
});
