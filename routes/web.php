<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/trang-chu', [HomeController::class,'index'])->name('pages.home');
//danh muc sp

Route::get('/category/{id}',[CategoryController::class,'showCategoryHome']);
Route::get('/brand/{id}',[CategoryController::class,'showBrandHome']);
Route::get('/detail/{id}',[ProductController::class,'detail']);


//backend
Route::get('/admin', [AdminController::class,'index'])->name('login');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class,'showRegister'])->name('admin.showRegister');
Route::post('/admin/register',[AdminController::class,'register'])->name('admin.register');
Route::get('/admin/logOut',[AdminController::class,'logOut'])->name('admin.logOut');
Route::get('/home', [AdminController::class,'home'])->name('admin.home');
Route::get('/admin/proFile',[AdminController::class,'showProfile'])->name('admin.profile');

//category
Route::get('/admin/add-category',[CategoryController::class,'addCategory'])->name('admin.addCategory');
Route::post('/admin/save-category',[CategoryController::class,'saveCategory'])->name('admin.saveCategory');
Route::get('/un_action/{id}',[CategoryController::class,'un_action']);
Route::get('/action/{id}',[CategoryController::class,'action']);
Route::get('/admin/show-category',[CategoryController::class,'showCategory'])->name('admin.showCategory');
Route::get('/edit/{id}',[CategoryController::class,'showFileUpdate']);
Route::post('/update/{id}',[CategoryController::class,'update'])->name('edit');
Route::get('/delete/{id}',[CategoryController::class,'delete']);

//brand
Route::get('/admin/add-brand',[BrandController::class,'addBrand'])->name('admin.addBrand');
Route::post('/admin/save-brand',[BrandController::class,'saveBrand'])->name('admin.saveBrand');
Route::get('/un_brand_action/{id}',[BrandController::class,'un_action']);
Route::get('/brand_action/{id}',[BrandController::class,'action']);
Route::get('/admin/show-brand',[BrandController::class,'showBrand'])->name('admin.showBrand');
Route::get('/brand_edit/{id}',[BrandController::class,'showFileUpdate']);
Route::post('/brand_update/{id}',[BrandController::class,'update'])->name('edit');
Route::get('/brand_delete/{id}',[BrandController::class,'delete']);

//product

Route::get('/admin/add-product',[ProductController::class,'addProduct'])->name('admin.addProduct');
Route::post('/admin/save-product',[ProductController::class,'saveProduct'])->name('admin.saveProduct');
Route::get('/un_product_action/{id}',[ProductController::class,'un_action']);
Route::get('/product_action/{id}',[ProductController::class,'action']);
Route::get('/admin/show-product',[ProductController::class,'showProduct'])->name('admin.showProduct');
Route::get('/product_edit/{id}',[ProductController::class,'showFileUpdate']);
Route::post('/product_update/{id}',[ProductController::class,'update'])->name('edit');
Route::get('/product_delete/{id}',[ProductController::class,'delete']);



//cart
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/show-cart',[CartController::class,'show_cart_ajax']);
Route::get('/delete_cart/{id}',[CartController::class,'delete_cart']);
Route::get('/delete_cart_all',[CartController::class,'delete_cart_all'])->name('delete_cart_all');
Route::post('/update_cart',[CartController::class,'update_cart']);

//coupon
Route::post('/coupon',[CartController::class,'coupon']);
