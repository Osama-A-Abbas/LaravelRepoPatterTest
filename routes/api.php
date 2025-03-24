<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/posts', [BlogPostController::class, 'index']);
Route::get('/posts{blogPost}', [BlogPostController::class, 'show']);
Route::post('/posts', [BlogPostController::class, 'store']);
Route::put('/posts{blogPost}', [BlogPostController::class, 'update']);
Route::delete('/posts{blogPost}', [BlogPostController::class, 'delete']);
