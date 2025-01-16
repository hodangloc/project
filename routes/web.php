<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\BloglistController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\Member;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

//Admin
Route::group([
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function(){

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //user
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'update']);

    //country
    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/country/add', [CountryController::class, 'add']);
    Route::post('/country/add', [CountryController::class, 'insert']);
    Route::get('/delete/{id}', [CountryController::class, 'delete']);

    //blog
    Route::get('/blog/add', [BlogController::class, 'add']);
    Route::post('blog/add', [BlogController::class, 'create']);
    Route::get('/blog/list', [BlogController::class, 'index']);
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit']);
    Route::post('/blog/edit/{id}', [BlogController::class, 'update']);
    Route::get('/blog/delete/{id}', [BlogController::class, 'delete']);

    //category
    Route::get('/category', [ProductController::class, 'category']);
    Route::get('/category/add', [ProductController::class, 'addcategory']);
    Route::post('/category/add', [ProductController::class, 'insertcategory']);
    Route::get('/category/delete/{id}', [ProductController::class, 'delcategory']);

    //brand
    Route::get('/brand', [ProductController::class, 'brand']);
    Route::get('/brand/add', [ProductController::class, 'addbrand']);
    Route::post('/brand/add', [ProductController::class, 'insertbrand']);
    Route::get('/brand/delete/{id}', [ProductController::class, 'delbrand']);
});

//Frontend
Route::group([
    'namespace' => 'Frontend'
], function(){

    Route::get('/index', [HomeController::class, 'index']);

    //blog
    Route::post('/blog/rate/ajax', [BloglistController::class, 'rate']);
    Route::post('/blog/comment', [BloglistController::class, 'comment'])->name('blog.comment');

    Route::post('/blog/comment/ajax', [BloglistController::class, 'comment2'])->name('blog.comment2');
    Route::get('/blog-single2/{id}', [BloglistController::class, 'show2']);
    Route::post('/blog/repcomment/ajax', [BloglistController::class, 'repCmt'])->name('blog.repcomment');

    Route::get('/blog-list', [BloglistController::class, 'index']);
    Route::get('/blog-single/{id}', [BloglistController::class, 'show']);

    //product
    Route::get('/index', [ProductController::class, 'show']);

    Route::get('/account/my-product', [ProductController::class, 'myproduct'])->name('account.my-product');
    Route::get('/account/add-product', [ProductController::class, 'addproduct'])->name('account.add-product');
    Route::post('/account/add-product', [ProductController::class, 'insert']);
    Route::get('/account/edit-product/{id}', [ProductController::class, 'editproduct'])->name('account.edit-product');
    Route::post('/account/edit-product/{id}', [ProductController::class, 'update']);
    Route::get('/account/delete-product/{id}', [ProductController::class, 'delete'])->name('account.delete-product');

    Route::get('/product-detail/{id}', [ProductController::class, 'productDetail']);

    Route::post('/product/add/ajax', [ProductController::class, 'addtocart']);

    Route::get('/cart', [ProductController::class, 'cart']);
    Route::post('/cart/add/ajax', [ProductController::class, 'addCart']);
    Route::post('/cart/delete/ajax', [ProductController::class, 'delCart']);
    Route::post('/cart/remove/ajax', [ProductController::class, 'removeCart']);

    //send mail
    Route::get('/checkout', [ProductController::class, 'checkout']);
    Route::post('/checkout', [RegisterController::class, 'create']);

    //search
    Route::post('/search', [SearchController::class, 'search'])->name('search');

    Route::get('/search-advanced', [SearchController::class, 'searchAdvanced'])->name('search.advanced');

    Route::post('/search/ajax', [SearchController::class, 'searchPrice']);

    //account
    Route::get('/account', [MemberController::class, 'account'])->name('account.update');
    Route::post('/account', [MemberController::class, 'update']);

    //check not login for form login
    Route::get('/member/register', [MemberController::class, 'showRegister']);
    Route::post('/member/register', [MemberController::class, 'register']);

    Route::get('/member/login', [MemberController::class, 'showLogin']);
    Route::post('/member/login', [MemberController::class, 'login']);

    Route::get('/logout', [MemberController::class, 'logout']);
});

// Route::get('/test', [MailController::class, 'index']);



