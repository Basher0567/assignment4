<?php

use App\Http\Controllers\ProductController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/products",[ProductController::class,'productList']);
Route::get("/products/create",[ProductController::class,'create']);
Route::post("/products",[ProductController::class,'store']);
Route::get("/products/{id}",[ProductController::class,'show']);

Route::get("/products/{id}/edit",[ProductController::class,'edit']);
Route::put("/products/{id}",[ProductController::class,'update']);
/*
Route::get("/edit/{id}/ed",[ProductController::class,'edit']);
Route::put("/update/{id}",[ProductController::class,'update']);
*/
Route::delete("/products/{id}",[ProductController::class,'delete']);
Route::get("/search",[ProductController::class,'search'])->name('searchProduct');

