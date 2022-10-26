<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admincontroller;
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

Route::get('/',[HomeController::class,'index']);
    
    

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
    Route::get('/view-cat',[Admincontroller::class,'view']);
    Route::post('/add_cat',[Admincontroller::class,'add_cat']);
    Route::get('/delete/{id}',[Admincontroller::class,'delete']);
    Route::get('/add_pro',[Admincontroller::class,'pro']);
    Route::post('/add_product',[Admincontroller::class,'addpro']);
    Route::get('/show_pro',[Admincontroller::class,'showpro']);
    Route::get('/deletepro/{id}',[Admincontroller::class,'deletepro']);
    Route::get('/edit/{id}',[Admincontroller::class,'editpro']);
    Route::get('/search',[Admincontroller::class,'search']);
    Route::post('/update_pro/{id}',[Admincontroller::class,'edit']);
    Route::get('/order',[Admincontroller::class,'order']);
    Route::get('/deleteorder/{id}',[Admincontroller::class,'deleteorder']);
    Route::get('/in/{id}',[Admincontroller::class,'in']);
    Route::get('/searcho',[Admincontroller::class,'searcho']);
   



    Route::get('/deli/{id}',[Admincontroller::class,'deli']);
    Route::get('/pro_detail/{id}',[HomeController::class,'prod']);
    Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
    Route::get('/show_cart',[HomeController::class,'cart']);
    Route::get('/remove/{id}',[HomeController::class,'remove']);
    Route::get('/cash',[HomeController::class,'cash']);
    Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
    Route::post('stripe/{totalprice}',[HomeController::class ,'stripePost'])->name('stripe.post');
    Route::get('/showorder',[HomeController::class,'showorder']);
    Route::get('/cancel/{id}',[HomeController::class,'cancel']);
    Route::get('/product_search',[HomeController::class,'product_search']);
    Route::get('/deleteh/{id}',[HomeController::class,'deleteh']);
    Route::get('/viewcateg/{slug}',[HomeController::class,'viewcateg']);
});




