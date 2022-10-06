<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;




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


Route::get('/admin',[AdminController::class,'index'])->name('showadmin');
Route::post('/admin/add',[AdminController::class,'addCategory'])->name('addcategory');
Route::get('/admin/delete/{id}',[AdminController::class,'deleteCategory'])->name('deletecategory');
Route::post('/admin/add/movie',[AdminController::class,'addMovie'])->name('addmovie');
Route::get('/admin/delete/movie/{id}',[AdminController::class,'deleteMovie'])->name('deletemovie');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
