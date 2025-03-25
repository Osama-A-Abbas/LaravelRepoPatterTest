<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;


Route::get('v1/posts', [BlogPostController::class, 'index']);
Route::get('v1/posts{blogPost}', [BlogPostController::class, 'show']);
Route::post('v1/posts', [BlogPostController::class, 'store']);
Route::put('v1/posts{blogPost}', [BlogPostController::class, 'update']);
Route::delete('v1/posts{blogPost}', [BlogPostController::class, 'delete']);
