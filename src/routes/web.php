<?php

use Illuminate\Support\Facades\Route;
use Laravia\Content\App\Http\Controllers\ContentController;

Route::get('/laravia/contents', [ContentController::class, 'index'])->name('laravia.content::index')->middleware(['web', 'auth']);
Route::get('/laravia/content/{id?}', [ContentController::class, 'edit'])->name('laravia.content::edit')->middleware(['web', 'auth']);
Route::post('/laravia/content/store', [ContentController::class, 'store'])->name('laravia.content::store')->middleware(['web', 'auth']);
Route::post('/laravia/content/update', [ContentController::class, 'update'])->name('laravia.content::update')->middleware(['web', 'auth']);
