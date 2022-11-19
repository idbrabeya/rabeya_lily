<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;




// Route::get('/', function () {
//     return view('frontend.index');
// });

Auth::routes();


Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/product/details/{slug}',[FrontendController::class,'product_details'])->name('product.details');
Route::get('/category/{category_id}',[FrontendController::class,'categorywiseproducts'])->name('categorywise.products');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/offer',[HomeController::class,'email_offer'])->name('email.offer');
Route::get('/single/email/offer/{id}',[HomeController::class,'single_email_offer'])->name('single.email.offer');
Route::post('/check/email/offer/',[HomeController::class,'check_email_offer'])->name('check.email.offer');

// profile
Route::get('/admin/profile',[ProfileController::class,'profile'])->name('profile');
Route::post('/admin/profile/namechange',[ProfileController::class,'namechange'])->name('profile.namechange');
Route::post('/admin/profile/passwordchange',[ProfileController::class,'passwordchange'])->name('profile.passwordchange');
Route::post('/admin/profile/photochange',[ProfileController::class,'photochange'])->name('profile.photochange');


// categroy ,vendor,product
Route::resource('category',CategoryController::class);
Route::resource('vendor',VendorController::class);
Route::resource('product',ProductController::class);
