<?php

use Illuminate\Support\Facades\Route;
use User\Infrastructure\Http\Controllers\UserLoginController;
use User\Infrastructure\Http\Controllers\UserRegistrationController;

Route::group(['prefix'=>'user'], function (): void {
    Route::post('register', UserRegistrationController::class);
    Route::get('login', UserLoginController::class);
});
