<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('Register',[UserController::class,'store'] ); //لإدخال بيانات المستخدم

Route::get('stores',[StoreController::class,'index'] );  // لعرض المتاجر

Route::post('stores',[StoreController::class,'store'] );  // لتخزين متجر

Route::delete('stores/{store_id}',[StoreController::class,'destory'] ); // لحزف متجر

Route::put('stores/{store_id}',[StoreController::class,'update'] ); // للتعديل على بيانات متجر

Route::get('product/{storeIndex}',[ProductController::class,'index']); //لعرض منتجات متجر

Route::post('product/{storeIndex}',[ProductController::class,'store']);//لتخزين منتج
