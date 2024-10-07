<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user(); 
// });

   Route::group([],function(){
    Route::post('register',[App\Http\Controllers\TestusersController::class,'register']);
    Route::post('login',[App\Http\Controllers\TestusersController::class,'login']); 
    Route::post('getUser',[App\Http\Controllers\TestusersController::class,'getUser'])->middleware('auth:sanctum');
    Route::post('logout',[App\Http\Controllers\TestusersController::class,'logout'])->middleware('auth:sanctum');
   });

   Route::post('RegisterUser',[App\Http\Controllers\TestusersController::class,'RegisterUser']);
   Route::get('export',[App\Http\Controllers\TestusersController::class ,'export']);
   Route::post('import',[App\Http\Controllers\TestusersController::class ,'import']);