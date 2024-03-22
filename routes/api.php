<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Console\Application;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/libros',[ApiController::class,'index']);
Route::post('/libros',[ApiController::class,'store']);
Route::delete('/libros/{id}', [ApiController::class, 'destroy']);
Route::put('/libros/{id}', [ApiController::class, 'update']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register']);

