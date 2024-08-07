<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/view_category',[AdminController::class,'view_category']);
Route::get('/create_category',[AdminController::class,'create_category']);
Route::post('/store_category',[AdminController::class,'store_category']);
Route::get('/edit_category/{id}',[AdminController::class,'edit_category']);
Route::post('/update_category/{id}',[AdminController::class,'update_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/orders',[AdminController::class,'orders']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/order_pdf/{id}',[AdminController::class,'order_pdf']);


Route::get('/view_product',[ProductController::class,'view_product']);
Route::get('/create_product',[ProductController::class,'create_product']);
Route::post('/store_product',[ProductController::class,'store_product']);
Route::get('/edit_product/{id}',[ProductController::class,'edit_product']);
Route::post('/update_product/{id}',[ProductController::class,'update_product']);
Route::get('/delete_product/{id}',[ProductController::class,'delete_product']);
Route::get('/product_details/{id}',[ProductController::class,'product_details']);
Route::post('/add_cart/{id}',[ProductController::class,'add_cart']);
Route::get('/show_cart',[ProductController::class,'show_cart']);
Route::get('/remove_cart/{id}',[ProductController::class,'remove_cart']);
Route::get('/cash_order',[ProductController::class,'cash_order']);
Route::get('/stripe/{totalprice}',[ProductController::class,'stripe']);
Route::post('stripe/{totalprice}',[ProductController::class,'stripePost'])->name('stripe.post');
