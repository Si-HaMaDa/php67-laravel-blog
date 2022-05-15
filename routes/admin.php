<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');

Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
