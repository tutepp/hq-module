<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
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



Route::resource('home',ItemController::class)->middleware(['auth']);
Route::get('/searchItem',[ItemController::class,'search'])->name('search')->middleware(['auth']);;;
//nhom bai viet

Route::resource('du-lich',ItemController::class)->middleware(['auth']);
Route::resource('lien-hoan',ItemController::class)->middleware(['auth']);
Route::resource('su-kien',ItemController::class)->middleware(['auth']);
Route::resource('tu-thien',ItemController::class)->middleware(['auth']);
//group
Route::resource('groups',GroupController::class)->middleware(['auth']);

//vi tri quang cao
Route::get('/advertisement',[AdvertisementController::class,'index'])->name('item.advertisement')->middleware(['auth']);;


//frontend
Route::get('/page',[PageController::class,'index'])->name('page.index');


Route::get('/blog',[BlogController::class,'index'])->name('blog.index');


Route::get('/blog/{slug}',[BlogController::class,'getItem'])->name('blog.item');




require __DIR__.'/auth.php';
