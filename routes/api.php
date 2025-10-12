<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\StoreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // Route untuk menghandle posts
    Route::prefix('posts')->group(function () {
        Route::get('/', [\App\Http\Controllers\PostsController::class, 'index']); //mengambil semua data pesan
        // Route::post('/', [\App\Http\Controllers\StoreController::class, 'store']); //menyimpan data
        Route::get('{id}', [\App\Http\Controllers\PostsController::class, 'show']); //mengambil data pesan berdasarkan ID
        Route::put('{id}', [\App\Http\Controllers\PostsController::class, 'update']); //mengupdate data pesan berdasarkan ID
        Route::delete('{id}', [\App\Http\Controllers\PostsController::class, 'destroy']); //menghapus data pesan berdasarkan ID
    });
});
