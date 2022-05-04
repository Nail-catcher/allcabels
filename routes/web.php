<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('home');
});

Route::get('/fabric', [App\Http\Controllers\Web\FabricController::class,'index']);

Route::get('/guides' , [App\Http\Controllers\Web\GuideController::class,'index']);
Route::get('/patterns' , [App\Http\Controllers\Web\PatternController::class,'index']);
Route::get('/patterns/create' , [App\Http\Controllers\Web\PatternController::class,'create']);
Route::get('/guide', [App\Http\Controllers\Web\GuideController::class,'show']);
Route::get('/guide/destroy/{guide}', [App\Http\Controllers\Web\GuideController::class,'destroy']);
Route::get('/product/destroy/{product}', [App\Http\Controllers\Web\CabelController::class,'destroy']);

Route::get('/pattern/destroy/{pattern}', [App\Http\Controllers\Web\PatternController::class,'destroy']);
Route::get('/conflict/destroy/{conflict}', [App\Http\Controllers\Web\PatternConflictController::class,'destroy']);
Route::resource('/conflicts',App\Http\Controllers\Web\ConflictController::class );
Route::resource('/patternconflicts',App\Http\Controllers\Web\PatternConflictController::class );

Route::resource('/patternotherguides',App\Http\Controllers\PatternOtherGuideController::class );
Route::get('/point/destroy/{point}', [App\Http\Controllers\Web\GuideController::class,'point_destroy']);
Route::get('/fabric/{id}/exclusion', function ($id) {
    return view('pages/exclusion', ['id' => $id]);
});

Route::get('/fabric/{id}/exclusion/new', function ($id) {
    return view('pages/exclusionNew', ['id' => $id]);
});

Route::get('/fabric/{id}/exclusion/index', function ($id) {
    return view('pages/exclusionIndex', ['id' => $id]);
});

Route::get('/fabric/{id}/patterns', function ($id) {
    return view('pages/pattern', ['id' => $id]);
});

Route::get('/fabric/{id}/patterns/new', function ($id) {
    return view('pages/patternNew', ['id' => $id]);
});

Route::get('/fabric/{id}/patterns/{pid}/exclusion', function ($id, $pid) {
    return view('pages/exclusionPattern', ['id' => $id, 'pid' => $pid]);
});

Route::resource('/cabels',App\Http\Controllers\Web\CabelController::class );

Route::get('/cabels/{id}', function ($id) {
    return view('pages/cabel', ['id' => $id]);
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::resource('/otherguides', App\Http\Controllers\OtherGuidesController::class);
Route::resource('/otherguidespoints', App\Http\Controllers\OtherGuidesPointsController::class);

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

