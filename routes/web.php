<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Frontend\FrontendController;

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


//Homepage
Route::get('/',[FrontendController::class,'index'])->name('home');
//login.blade.php page view route
Route::get('/login',[LoginController::class,'index'])->name('login');
//login data submit
Route::post('/login',[LoginController::class,'login']);



Route::middleware('auth')->group(function(){

//logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
   
Route::middleware('IsAdmin')->prefix('dashboard')->group(function(){

//view backend/dashboard.blade.php file 
Route::get('/',[DashboardController::class,'index'])->name('dashboard');

//view backend products/index.blade.php file
Route::get('/products',[ProductController::class,'index'])->name('admin.product');
//view careate product page
Route::get('/products/create',[ProductController::class,'create'])->name('admin.product.create');
//careate.blade.php product save data in database route
Route::post('/products/create',[ProductController::class,'store']);
//edit.blade.php page dakhabe
Route::get('products/{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
//edit korar por new data save korar jonno
Route::post('products/{id}/edit',[ProductController::class,'update']);
//delet
Route::get('product/{id}/delete',[ProductController::class,'delete'])->name('admin.product.delete');



  
});

});








