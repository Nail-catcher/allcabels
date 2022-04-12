<?php

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
Route::post('/patterns/{pattern}/patternPoints', [\App\Http\Controllers\PatternController::class, 'patternPoints']);

Route::resource('/product', \App\Http\Controllers\ProductsController::class);
Route::get('/storeProduct', \App\Http\Controllers\ProductController::class)->name('generate');
Route::resource('/fabrics', \App\Http\Controllers\FabricController::class);
//Route::resource('/products', \App\Http\Controllers\ProductsController::class);
Route::resource('/guides', \App\Http\Controllers\GuideController::class);
Route::resource('/patterns', \App\Http\Controllers\PatternController::class);
Route::resource('/points', \App\Http\Controllers\PointController::class);
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/apiconflicts', \App\Http\Controllers\ConflictController::class);
Route::resource('/constants', \App\Http\Controllers\ConstantController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
