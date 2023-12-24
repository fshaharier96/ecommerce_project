<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//
//    return view('dashboard');
//})->middleware(['auth','role:user'])->name('dashboard');

Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(\App\Http\Controllers\User\DashboardController::class)->group(function(){
        Route::get('/dashboard','index')->name('userdashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','verified','role:admin'])->group(function(){
       Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function(){
           Route::get('/admin/dashboard','index')->name('admindashboard');
       });

       Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function(){
           Route::get('/admin/all-category','index')->name('allcategory');
           Route::get('/admin/add-category','addCategory')->name('addcategory');
       });
    Route::controller(\App\Http\Controllers\Admin\SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','addSubCategory')->name('addsubcategory');
    });

    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/admin/all-product','index')->name('allproduct');
        Route::get('/admin/add-product','addProduct')->name('addproduct');
    });

    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/admin/pending-orders','index')->name('pendingorders');

    });
});

require __DIR__.'/auth.php';
