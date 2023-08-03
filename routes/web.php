<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

Route::get('/',[PageController::class,'index'])->name('index');
Route::get('/read',[PageController::class,'read'])->name('read');
Route::get('/show/{id}',[PageController::class,'show'])->name('show');
Route::get('/create-page',[PageController::class,'create'])->name('create-page');
Route::post('/store-new',[PageController::class,'store'])->name('store-new');
Route::delete('/delete/{id}',[PageController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[PageController::class,'edit'])->name('edit');
Route::put('/update/{id}',[PageController::class,'update'])->name('update');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');