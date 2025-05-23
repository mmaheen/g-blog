<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Backend\Admin\AdminBlogController;
use App\Http\Controllers\Backend\Client\ClientBlogController;
use App\Http\Controllers\Backend\Client\ClientPhotoController;
use App\Http\Middleware\AuthAdmin;

Auth::routes();

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/details/{slug}', [SiteController::class, 'blogDetails'])->name('blog.details');
Route::get('/photo/details/{photo}', [SiteController::class, 'photoDetails'])->name('photo.details');

Route::post('/contact', [EmailController::class, 'contact'])->name('contact');

Route::prefix('/dashboard/admin')->name('dashboard.admin.')->middleware('auth',AuthAdmin::class)->group(function(){
    Route::get('/',[AdminController::class,'dashboard'])->name('index');
    Route::get('/register',[AdminController::class,'register'])->name('register');
    Route::post('/register',[AdminController::class,'store'])->name('store');
    Route::get('lock',[AdminController::class,'lock'])->name('lock');

    Route::resources([
        '/blog' => AdminBlogController::class,
    ]);
});

Route::prefix('/dashboard/user')->name('dashboard.client.')->middleware('auth')->group(function(){
    Route::get('/',[ClientController::class,'dashboard'])->name('index');
    Route::get('/gallery',[ClientController::class,'gallery'])->name('gallery');

    Route::resources([
        '/blog' => ClientBlogController::class,
        '/photo' => ClientPhotoController::class,
    ]);
});