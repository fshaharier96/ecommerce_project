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

//Route::get('/', function () {
//
//});

//Route::get('/dashboard', function () {
//
//    return view('dashboard');
//})->middleware(['auth','role:user'])->name('dashboard');

Route::controller(\App\Http\Controllers\HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});

Route::controller(\App\Http\Controllers\ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}','category')->name('category');
    Route::get('/product-details/{id}/{slug}','singleProduct')->name('singleproduct');
    Route::get('/add-to-cart','addToCart')->name('addtocart');
    Route::get('/checkout','checkout')->name('checkout');
    Route::get('/user-profile','userProfile')->name('userprofile');
    Route::get('/new-release','newRelease')->name('newrelease');
    Route::get('/todays-deal','todaysDeal')->name('todaysdeal');
    Route::get('/customer-service','customerService')->name('customerservice');
});

Route::middleware((['auth','role:user']))->group(function(){
    Route::controller(\App\Http\Controllers\ClientController::class)->group(function(){

        Route::get('/add-to-cart','addToCart')->name('addtocart');
        Route::post('/add-product-to-cart','addProductToCart')->name('addproducttocart');
        Route::get('/remove-cart/{id}','removeCart')->name('removecart');
        Route::get('/shipping-address','getShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address','addShippingAddress')->name('addshippingaddress');
        Route::get('/checkout','checkout')->name('checkout');
        Route::post('/place-order','placeOrder')->name('placeorder');
        Route::get('/user-profile','userProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders','pendingOrders')->name('userpendingorders');
        Route::get('/user-profile/history','history')->name('history');
        Route::get('/user-profile','userProfile')->name('userprofile');

        Route::get('/todays-deal','todaysDeal')->name('todaysdeal');
        Route::get('/customer-service','customerService')->name('customerservice');
    });
});

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
           Route::post('/admin/store-category','storeCategory')->name('storecategory');
           Route::get('/admin/edit-category/{id}','editCategory')->name('editcategory');
           Route::post('/admin/update-category','updateCategory')->name('updatecategory');
           Route::get('/admin/delete-category/{id}','deleteCategory')->name('deletecategory');
       });
    Route::controller(\App\Http\Controllers\Admin\SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','addSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','storeSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}','editSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory','updateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}','deleteSubCategory')->name('deletesubcategory');

    });

    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/admin/all-product','index')->name('allproduct');
        Route::get('/admin/add-product','addProduct')->name('addproduct');
        Route::post('/admin/store-product','storeProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}','editProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img','updateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}','editProduct')->name('editproduct');
        Route::post('/admin/update-product','updateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}','deleteProduct')->name('deleteproduct');

    });

    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/admin/pending-orders','index')->name('pendingorders');

    });
});

require __DIR__.'/auth.php';
