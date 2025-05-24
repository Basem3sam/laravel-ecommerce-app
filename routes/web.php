<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login',[AuthController::class,'validateUser'])->name('auth.validateUser');

Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/register',[AuthController::class,'store'])->name('auth.store');

Route::post('/', [AuthController::class,'logout'])->name('auth.logout');

Route::get('/dashboard', [AdminController::class,'index'])->middleware('isAdmin')->name('admin.dashboard');
Route::get('/dashboard/categories', [CategoryController::class,'index'])->middleware('isAdmin')->name('admin.categories.index');
Route::get('/dashboard/categories/{category}/edit', [CategoryController::class,'edit'])->middleware('isAdmin')->name('admin.categories.edit');
Route::get('/dashboard/categories/create', [CategoryController::class,'create'])->middleware('isAdmin')->name('admin.categories.create');

Route::post('/dashboard/categories', [CategoryController::class,'store'])->middleware('isAdmin')->name('admin.categories.store');
Route::delete('/dashboard/categories/{category}', [CategoryController::class,'destroy'])->middleware('isAdmin')->name('admin.categories.destroy');
Route::put('/dashboard/categories/{category}', [CategoryController::class,'update'])->middleware('isAdmin')->name('admin.categories.update');

Route::resource('products', ProductController::class);

Route::resource('shops', ShopController::class);

Route::get('/Categories', [ShopController::class, 'viewCategories'])->name('categories.index');
Route::get('/Categories/{category}/products', [ShopController::class, 'viewProductsByCategory'])->name('categories.products');

Route::get('/Search', [HomeController::class, 'searchWithProductsName'])->name('search');