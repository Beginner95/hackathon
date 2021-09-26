<?php

use App\Http\Controllers\Destitute\DestituteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sonko\SonkoController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/page/account-settings', [UserController::class, 'accountSettings']);
    Route::post('/account-setting/general/save', [UserController::class, 'generalSave'])->name('account.general.save');

    Route::resource('/sonko', SonkoController::class);
    Route::resource('/destitute', DestituteController::class);
});


