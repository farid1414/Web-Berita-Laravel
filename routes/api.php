<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\NewsController;
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
// Route::get('/news', [NewsController::class, 'index']);
// Route::post('/news', [NewsController::class, 'store']);
// Route::get('/news/show/{id}', [NewsController::class, 'show']);
Route::resource('news','\App\Http\Controllers\Api\NewsController');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});