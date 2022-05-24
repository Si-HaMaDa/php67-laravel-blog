<?php

use App\Http\Controllers\Api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('first', function () {
    return ['key' => 'First API route'];
});


// Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');

// Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');

// Route::get('blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

// Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::resource('blogs', BlogController::class);
