<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/offer',[HomeController::class,'email_offer'])->name('email.offer');
Route::get('/single/email/offer/{id}',[HomeController::class,'single_email_offer'])->name('single.email.offer');
Route::post('/check/email/offer/',[HomeController::class,'check_email_offer'])->name('check.email.offer');

Route::get('/admin/profile',[ProfileController::class,'profile'])->name('profile');
Route::post('/admin/profile/namechange',[ProfileController::class,'namechange'])->name('profile.namechange');
Route::post('/admin/profile/passwordchange',[ProfileController::class,'passwordchange'])->name('profile.passwordchange');
Route::post('/admin/profile/photochange',[ProfileController::class,'photochange'])->name('profile.photochange');


// categroy
Route::resource('category',CategoryController::class);
