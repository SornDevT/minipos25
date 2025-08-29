<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\BillController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);


// route category
Route::group(['middleware' => 'auth:api'], function(){

    Route::get('/category/index', [CategoryController::class, 'index']);
    Route::post('/category/add', [CategoryController::class, 'add']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);

});

// route product
Route::group(['middleware' => 'auth:api'], function(){

    Route::get('/product/index', [ProductController::class, 'index']);
    Route::post('/product/add', [ProductController::class, 'add']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);

});

// route transection
Route::group(['middleware' => 'auth:api'], function(){

    Route::get('/transection/index', [TransectionController::class, 'index']);
    Route::post('/transection/add', [TransectionController::class, 'add']);
    // Route::get('/transection/edit/{id}', [TransectionController::class, 'edit']);
    // Route::post('/transection/update/{id}', [TransectionController::class, 'update']);
    // Route::delete('/transection/delete/{id}', [TransectionController::class, 'delete']);

});

Route::get('/bill/print/{id}', [BillController::class, 'print']);