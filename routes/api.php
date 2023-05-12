<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeprtController;
use App\Http\Controllers\StudentApiController;
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

Route::get('students',[StudentApiController::class,'index']);
Route::post('students',[StudentApiController::class,'store']);
Route::get('students/{id}',[StudentApiController::class,'show']);
Route::get('students/{id}/edit',[StudentApiController::class,'edit']);
Route::put('students/{id}/update',[StudentApiController::class,'update']);
Route::delete('students/{id}/delete',[StudentApiController::class,'delete']);


Route::get('deprts',[DeprtController::class,'index']);

Route::post('deprts',[DeprtController::class,'create']);