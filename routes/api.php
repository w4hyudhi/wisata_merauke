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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'wisata', 'as' => 'wisata.'], function () {
    Route::get('index', [\App\Http\Controllers\Api\WisataController::class, 'index'])->name('index');
    Route::post('search',[\App\Http\Controllers\Api\WisataController::class, 'search'])->name('search');
});
