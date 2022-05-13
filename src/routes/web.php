<?php

use Illuminate\Support\Facades\Route;
use Laravia\Content\App\Http\Controllers\ContentController;

Route::get('/laravia/content', [ContentController::class, 'home'])->name('laravia.content::home')->middleware(['web', 'auth']);
