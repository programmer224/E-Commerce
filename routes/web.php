<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Dashboard

Route::group(['prefix'=>'admin/','middleware'=>'auth'],function(){
    Route::get('/',[AdminController::class,'admin'])->name('admin');
});



// Banner

Route::resource('/banner', BannerController::class);
Route::post('banner_status', [BannerController::class,'bannerStatus'])->name('banner.status');


// Category

Route::resource('/category', CategoryController::class);
Route::post('category_status', [CategoryController::class,'categoryStatus'])->name('category.status');



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


