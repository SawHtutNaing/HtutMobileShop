<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserConctroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;




Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('verified');


Route::get('/login', function () {
    return view('Auth/login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', function () {
    return view('Auth/register');
})->name('register');

Route::post(
    '/register',
    [AuthController::class, 'register']
)->name('register');



Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');



// email verify 
Route::get('/email/verify', function () {
    return view('Auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//email verify 


//add to cart 
Route::get('/my-cart', [ProductController::class, 'CartIndex'])->name('cart-view');
Route::get('/profile', [UserConctroller::class, 'show'])->name('profile');
Route::get('/profile-setting', [UserConctroller::class, 'edit'])->name('profileSettingUpdate');
Route::get('add-to-cart/{product}', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('remove-from-cart/{productUser}', [ProductController::class, 'removeFromCart'])->name('remove-from-cart');


Route::get('single-purchase/{productUser}', [ProductController::class, 'singlePurchase'])->name('sigle-purchase');
Route::get('bluk-purchase', [ProductController::class, 'buldPurchase'])->name('bulk-purchase');


//History record 

Route::get('record', [UserConctroller::class, 'record'])->name('record');
