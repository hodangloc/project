<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Middleware\Member;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/blog', [BlogController::class, 'list']);


Route::group(['namespace' => 'api'], function(){
    //member
    Route::post('/login', [MemberController::class, 'login']);
    Route::post('/register', [MemberController::class, 'register']);

    //product
    Route::get('/product', [ProductController::class, 'productHome']);
    Route::get('/product/list',[ProductController::class, 'productList']);
    Route::get('/product/wishlist',[ProductController::class, 'productWishlist']);
    Route::get('/product/detail/{id}',[ProductController::class, 'detail']);
    Route::post('/product/cart',[ProductController::class, 'productCart']);

    //Blog
    Route::get('/blog',[BlogController::class, 'list']);
});