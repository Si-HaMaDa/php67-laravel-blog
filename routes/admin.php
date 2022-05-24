<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::group([
    // 'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'prefix' => 'admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');

    // Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');

    // Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');

    // Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

    // Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

    // Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

    // Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::resource('blogs', BlogController::class);

    Route::resource('users', UserController::class);

    Route::resource('tags', TagController::class);
});
