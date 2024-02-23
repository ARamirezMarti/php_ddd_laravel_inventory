<?php

use App\Modules\Inventory\Infrastructure\Http\Controllers\GetAllInventoriesController;
use Inventory\Infrastructure\Http\Controllers\CreateInventoryController;
use Inventory\Infrastructure\Http\Controllers\DeleteInventoryController;
use Inventory\Infrastructure\Http\Controllers\GetInventoryController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'inventory'],function(){
  Route::get('/',GetAllInventoriesController::class);  
  Route::get('/{uuid}',GetInventoryController::class);  
  Route::post('/{uuid}',CreateInventoryController::class);  
  Route::delete('/{uuid}',DeleteInventoryController::class);  
});