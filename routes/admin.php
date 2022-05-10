<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('blogs/{id}/show', [BlogController::class, 'show'])->name('blogs.show');

Route::get('blogs/{id}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
