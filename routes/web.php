<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Carts;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('add/category', [AdminController::class, 'add_category']);
Route::get('category_delete/{id?}', [AdminController::class, 'category_delete']);

Route::get('/view_product', [AdminController::class, 'view_product']);


Route::get('/view_orders', [AdminController::class, 'view_orders']);


Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/list_product', [AdminController::class, 'list_product']);


Route::get('/product_delete/{id?}', [AdminController::class, 'product_delete']);


// Route::get('/{id?}',[AdminController::class,'edit_product']);

Route::post('/products_edit', [AdminController::class, 'products_edit']);

Route::get('/product_details/{id?}', [HomeController::class, 'product_details']);


Route::get('/addtocart', [HomeController::class, '']);


Route::post('add_cart/{id?}', [HomeController::class, 'add_cart']);


Route::post('/showcart', [HomeController::class, 'showcart']);
//i have a duplicate route  for get request this->  

Route::get('/showcart', [HomeController::class, 'showcart']);

Route::get('/show_order', [HomeController::class, 'show_order']);


Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);


Route::get('/delete/{id}', [HomeController::class, 'cartdlt']);

Route::get('/cash_order', [HomeController::class, 'cash_order']);


Route::get('/payments', [StripePaymentController::class, 'create']);
Route::post('/payments', [StripePaymentController::class, 'store']);
Route::get('/thankyou', [StripePaymentController::class, 'thankyou']);



Route::get('/delivered/{id}', [AdminController::class, 'delivered']);


Route::get('/print_pdf/{id}', [AdminController::class, 'pdf']);


Route::post('/search', [AdminController::class, 'search']);


Route::post('/add_comment', [HomeController::class, 'add_comment']);



Route::post('/reply/{id?}', [HomeController::class, 'add_reply']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/check', function  () {

 return view('home.javascript');
});