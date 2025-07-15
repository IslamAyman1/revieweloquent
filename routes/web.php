<?php

use App\Http\Controllers\exportExcelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[userController::class, 'index'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/export-excel',[exportExcelController::class, 'exportExcel'])->name('export-excel');
Route::post('/import-excel',[exportExcelController::class, 'importExcel'])->name('import-excel');
Route::group([],function(){
    Route::post('register',[App\Http\Controllers\TestusersController::class,'register']);
    Route::post('login',[App\Http\Controllers\TestusersController::class,'login']); 
    Route::post('getUser',[App\Http\Controllers\TestusersController::class,'getUser'])->middleware('auth:sanctum');
    Route::post('logout',[App\Http\Controllers\TestusersController::class,'logout'])->middleware('auth:sanctum');
   });

   Route::post('RegisterUser',[App\Http\Controllers\TestusersController::class,'RegisterUser']);
   Route::get('/testRole',function(){
    return view('uploadImage');
   })->middleware('auth');
   Route::get('posts/edit/{post}', [App\Http\Controllers\postController::class, 'edit'])->name('posts.edit')->can('update','post');
require __DIR__.'/auth.php';

Route::get('getphone/{email}' , [userController::class , 'getPhone'])->name('user.phone');

Route::get('/product/{id}', [userController::class, 'show'])->name('product.show');
Route::post('store' , [ProductController::class, 'store'])->name('product.store');
