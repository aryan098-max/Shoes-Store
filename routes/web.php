<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    // Before that we need to erase the session from the browser
    // Forget function erases the session of the current user
    Session::forget('user');
    return redirect('login');
});

Route::view('/register','register');
Route::post('/register', [UserController::class,'register']);


Route::post('/login', [UserController::class,'login']);
Route::get('/', [ProductController::class,'index']);
Route::get('detail/{id}', [ProductController::class,'detail']);
Route::get('search',[ProductController::class, 'search']);
Route::post("add_to_cart", [ProductController::class,'addToCart']);
Route::get("cartlist", [ProductController::class,'cartList']);
Route::get("removecart/{id}", [ProductController::class,'removeCart']);
Route::get("order", [ProductController::class,'order']);
Route::post("placeorder", [ProductController::class,'placeOrder']);
Route::get("myorder", [ProductController::class,'myorder']);
Route::get("buy", [ProductController::class,'buy']);






