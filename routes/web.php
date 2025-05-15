<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/details/{blog}', [SiteController::class, 'blogDetails'])->name('blog.details');
Route::get('/photo/details/{photo}', [SiteController::class, 'photoDetails'])->name('photo.details');

Route::post('/contact', [SiteController::class, 'contact'])->name('contact');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
