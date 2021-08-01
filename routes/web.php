<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
    return view('pages.home');
});
Route::get('/trang-chu', [HomeController::class,'index'])->name('pages.home');


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
