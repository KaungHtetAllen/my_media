<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\TrendPostController;

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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    //admin profile
    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::post('admin/update',[ProfileController::class,'updateAdminAccount'])->name('admin#updateAdminAccount');

    //admin password change
    Route::get('admin/changePasswordPage',[ProfileController::class,'changePasswordPage'])->name('admin#changePasswordPage');
    Route::post('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');


    //admin list
    Route::get('admin/list',[AdminListController::class,'index'])->name('admin#list');
    Route::get('admin/delete/{id}',[AdminListController::class,'delete'])->name('admin#delete');
    Route::post('admin/list/search',[AdminListController::class,'adminListSearch'])->name('admin#adminListSearch');

    //category
    Route::get('category',[CategoryController::class,'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
    Route::post('category/search',[CategoryController::class,'categorySearch'])->name('admin#categorySearch');
    Route::get('category/editPage/{id}',[CategoryController::class,'categoryEditPage'])->name('admin#categoryEditPage');
    Route::post('category/update',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');

    //post
    Route::get('post',[PostController::class,'index'])->name('admin#post');
    Route::post('post/create',[PostController::class,'createPost'])->name('admin#createPost');
    Route::get('post/delete/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    Route::get('post/editPage/{id}',[PostController::class,'postEditPage'])->name('admin#postEditPage');
    Route::post('post/update/{id}',[PostController::class,'updatePost'])->name('admin#updatePost');

    //trend post
    Route::get('trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
    Route::get('trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
    Route::get('trendPost/details/{id}',[TrendPostController::class,'trendPostDetails'])->name('admin#trendPostDetails');

});
