<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dev;
use App\Http\Controllers\Home;

Route::get('/', Home::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');

// dev
Route::get('/dev', [Dev::class, 'index'])->name('dev')->middleware('auth');
// scrud dev
Route::get('/dev/search', [Dev::class, 'search'])->name('search')->middleware('auth');
Route::get('/dev/create', [Dev::class, 'create'])->name('create')->middleware('auth');
Route::post('/store', [Dev::class, 'store'])->name('store')->middleware('auth');
Route::get('/dev/edit/{id}', [Dev::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/dev/update', [Dev::class, 'update'])->name('update')->middleware('auth');
Route::get('/dev/delete/{id}', [Dev::class, 'delete'])->name('delete')->middleware('auth');
// notification dev
Route::get('/notification', [Dev::class, 'notification'])->name('notification')->middleware('auth');
