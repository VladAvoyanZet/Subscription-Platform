<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebSiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * API's for website
 */

Route::get('website', [WebSiteController::class, 'index']);
Route::post('website', [WebSiteController::class, 'store']);
Route::get('website/{id}', [WebSiteController::class, 'show']);
Route::delete('website/{id}', [WebSiteController::class, 'destroy']);

Route::prefix('post')->group(function () {
    Route::get('get', [PostController::class, 'index']);
    Route::post('create', [PostController::class, 'store']);
    Route::get('view/{id}',  [PostController::class, 'show']);
    Route::delete('delete/{id}', [PostController::class, 'destroy']);
});
