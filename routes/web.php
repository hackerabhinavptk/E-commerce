<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/view_category',[AdminController::class,'view_category']);

Route::post('add/category',[AdminController::class,'add_category']);
Route::get('category_delete/{id?}',[AdminController::class,'category_delete']);

Route::get('/view_product',[AdminController::class,'view_product']);


Route::post('/add_product',[AdminController::class,'add_product']);

Route::get('/list_product',[AdminController::class,'list_product']);


Route::get('/product_delete/{id?}',[AdminController::class,'product_delete']);


Route::get('/{id?}',[AdminController::class,'edit_product']);

Route::post('/products_edit',[AdminController::class,'products_edit']);

Route::get('/product_details/{id?}',[HomeController::class,'product_details']);


Route::get('/addtocart',[HomeController::class,'']);

