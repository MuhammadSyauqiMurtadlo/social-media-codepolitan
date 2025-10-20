<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\JWTAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // Handle authentication routes
    Route::post('register', [JWTAuthController::class, 'register']);
    Route::post('login', [JWTAuthController::class, 'login']);


    // Route untuk menghandle posts
    Route::prefix('posts')->group(function () {
        Route::get('/', [\App\Http\Controllers\PostsController::class, 'index']); //mengambil semua data pesan
        Route::post('/', [\App\Http\Controllers\PostsController::class, 'store']); //menyimpan data
        Route::get('{id}', [\App\Http\Controllers\PostsController::class, 'show']); //mengambil data pesan berdasarkan ID
        Route::put('{id}', [\App\Http\Controllers\PostsController::class, 'update']); //mengupdate data pesan berdasarkan ID
        Route::delete('{id}', [\App\Http\Controllers\PostsController::class, 'destroy']); //menghapus data pesan berdasarkan ID
    });

    // Route untuk menghandle comments
    Route::prefix('comments')->group(function () {
        Route::post('/', [\App\Http\Controllers\CommentsController::class, 'store']); //mengambil semua data komentar
        Route::delete('{id}', [\App\Http\Controllers\CommentsController::class, 'destroy']); //menghapus data komentar berdasarkan ID
    });

    // Route untuk menghandle likes
    Route::prefix('likes')->group(function () {
        Route::post('/', [\App\Http\Controllers\LikesController::class, 'store']); //menyimpan data like
        Route::delete('{id}', [\App\Http\Controllers\LikesController::class, 'destroy']); //menghapus data like berdasarkan ID
    });

    // Route untuk menghandle messages
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessagesController::class, 'index']); //mengambil semua data pesan
        Route::post('/', [MessagesController::class, 'store']); //menyimpan data pesan
        Route::get('{id}', [MessagesController::class, 'show']); //mengambil data pesan berdasarkan ID
        Route::get('user/{user_id}', [MessagesController::class, 'getMessagesByUserId']); //mengambil data pesan berdasarkan user_id
        Route::put('{id}', [MessagesController::class, 'update']); //mengupdate data pesan berdasarkan ID
        Route::delete('{id}', [MessagesController::class, 'destroy']); //menghapus data pesan berdasarkan ID
    });
});
