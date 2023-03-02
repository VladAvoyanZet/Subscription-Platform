<?php

use App\Http\Controllers\SportController;
use App\Http\Controllers\StoreSubscriberController;
use App\Http\Controllers\WebSitePostsController;
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

//
//Route::get('test/{websiteId}', function (Request $request, $websiteId) {
//    dd($websiteId);
//    dd($request->get('username'));
//});
//
////Route::post('subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe']);
//
//
//Route::get('subscribers/{subscribers}', function (Request $request, $subs) {
//    dd($subs);
//});


Route::get('posts', [WebSitePostsController::class, 'index']);
Route::post('subscriber', [StoreSubscriberController::class, 'store']);
Route::get('posts/{website}', [SportController::class, 'index']);
Route::post('post/create', [SportController::class, 'store']);
