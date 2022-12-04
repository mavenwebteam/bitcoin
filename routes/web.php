<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/coin-market', function () {
    return view('coin-market');
});
Auth::routes();
Route::get('/customer/otpverify','App\Http\Controllers\otpverifycontroller@index');
Route::post('/customer/verify','App\Http\Controllers\otpverifycontroller@verify');
Route::get('/customer/register-submit',[App\Http\Controllers\CustomerAddController::class, 'registerCustomeradd'])->name('customer.register.submit');
Route::post('/customer/register-submit',[App\Http\Controllers\CustomerAddController::class, 'registerCustomer'])->name('customer.register.submit');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('customer')->group(function() {
    Route::get('/login','App\Http\Controllers\Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'App\Http\Controllers\Auth\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('logout/', 'App\Http\Controllers\Auth\CustomerLoginController@logout')->name('customer.logout');
    Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/coin-market', [App\Http\Controllers\CustomerController::class, 'coinMarket'])->name('customer.coinMarket');
    Route::get('/buy_giftcard', [App\Http\Controllers\CustomerController::class, 'create_giftcard'])->name('customer.create_giftcard');
    Route::post('/store_giftcard', [App\Http\Controllers\CustomerController::class, 'buy_giftcard'])->name('customer.buy_giftcard');
    Route::get('/order_list', [App\Http\Controllers\CustomerController::class, 'order_list'])->name('customer.order_list');
    Route::get('/invoice/{order_id}', [App\Http\Controllers\CustomerController::class, 'invoice'])->name('customer.invoice');
    
});
Route::prefix('admin')->group(function() {
    Route::get('/login','App\Http\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'App\Http\Controllers\Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.user');
    Route::get('/coin-market', [App\Http\Controllers\AdminController::class, 'coinMarket'])->name('admin.coinMarket');
    Route::get('/buy_giftcard', [App\Http\Controllers\AdminController::class, 'create_giftcard'])->name('admin.create_giftcard');
    Route::post('/buy_giftcard', [App\Http\Controllers\AdminController::class, 'buy_giftcard'])->name('admin.buy_giftcard');
    Route::get('/invoice/{order_id}', [App\Http\Controllers\AdminController::class, 'invoice'])->name('admin.invoice');

    Route::get('/invoice/{order_id}/confirm', [App\Http\Controllers\AdminController::class, 'confirm']);

    Route::get('/register-submit',[App\Http\Controllers\AdminController::class, 'registerAdminadd'])->name('admin.register.submit');
    Route::post('/register-submit',[App\Http\Controllers\AdminController::class, 'registerAdmin'])->name('admin.register.submit'); 
});