<?php

use App\Http\Controllers\companyController;
use App\Http\Controllers\healthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\prodtypeController;

use Illuminate\Support\Facades\Route;

Route::get('/health_check',healthController::class);


Route::group(['middleware'=>['auth:sanctum']],function (){
    Route::post('inventory/create',[inventoryController::class,'createInventory']);    
    Route::delete('inventory/delete',[inventoryController::class,'deleteInventory']);    
    Route::get('inventory',[inventoryController::class,'getInventory']);    
    
    Route::post('product/create',[productController::class,'createProduct']);    
    Route::delete('product/delete',[productController::class,'deleteProduct']);  
    Route::post('product/update',[productController::class,'updateProduct']);    
    Route::get('product/one',[productController::class,'getOneProduct']);    
    Route::get('product/all',[productController::class,'getAllProduct']);
    
    
    Route::get('types',[prodtypeController::class,'getTypes']);    


    Route::get('product/companies/all',[companyController::class,'getAllCompanyByUser']);
    


});