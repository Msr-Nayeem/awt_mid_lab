<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAPIController;

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
Route::get('/students/list',[LoginAPIController::class,'APIList'])->middleware('ApiAuth');

Route::post('/students/list',[LoginAPIController::class,'APIpost']);

//REGISTRATION
Route::post('/apiRegistration',[LoginAPIController::class,'apiRegistration']); 

//LOGIN
Route::post('/apiLogin',[LoginAPIController::class,'apiLogin']); 


//LOGOUT
Route::post('/apiLogout',[LoginAPIController::class,'apiLogout']); 



