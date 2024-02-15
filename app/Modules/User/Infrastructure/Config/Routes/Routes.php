<?php

use User\Infrastructure\Http\Controllers\UserLoginController;
use User\Infrastructure\Http\Controllers\UserRegistrationController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'user'],function(){

    Route::post('register',UserRegistrationController::class);
    Route::get('login',UserLoginController::class);

});