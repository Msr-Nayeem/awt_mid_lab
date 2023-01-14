<?php

use App\Http\Controllers\APIAdminController;
use App\Http\Controllers\APILoginController;
use App\Http\Controllers\APIReceiptionistController;
use App\Http\Controllers\APICustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\OtpController;

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
Route::post('/apiLogout',[LoginAPIController::class,'apiLogout']); 



//API_LOGIN
Route::post('/login',[APILoginController::class,'login']);
Route::post('/logout',[APILoginController::class,'logout']);

//ADMIN
Route::get('/admin/AdminList',[APIAdminController::class,'AdminList']);
Route::get('/admin/DeleteAdmin',[APIAdminController::class,'DeleteAdmin']);
Route::get('/admin/changeStatus',[APIAdminController::class,'changeStatus']);

//Customer
Route::get('/customer/CustomerList',[APICustomerController::class,'CustomerList']);
Route::get('/customer/deleteCustomer',[APICustomerController::class,'deleteCustomer']);
Route::get('/customer/changeStatus',[APICustomerController::class,'changeStatus']);

//Receiptionist
Route::get('/receiptionist/ReceiptionistList',[APIReceiptionistController::class,'ReceiptionistList']);
Route::get('/receiptionist/deleteReceiptionist',[APIReceiptionistController::class,'deleteReceiptionist']);
Route::get('/receiptionist/changeStatus',[APIReceiptionistController::class,'changeStatus']);

//ROOMS
Route::get('/rooms',[LoginAPIController::class,'rooms']);
Route::get('/deleteRooms',[LoginAPIController::class,'deleteRooms']);


//BOOKING
Route::get('/cancelBooking',[LoginAPIController::class,'cancelBooking']);
Route::get('/makeBooking',[LoginAPIController::class,'makeBooking']);
Route::get('/addRoom',[LoginAPIController::class,'addRoom']);
Route::get('/getRent',[LoginAPIController::class,'getRent']);

Route::get('/getCetegory',[LoginAPIController::class,'getCetegory']);
Route::get('/getRooms',[LoginAPIController::class,'getRooms']);
Route::get('/country',[LoginAPIController::class,'country']);
Route::get('/getCustomer',[LoginAPIController::class,'getCustomer']);

//PROFILE
/* Route::get('/getId',[LoginAPIController::class,'getId']); */
Route::get('/profile',[LoginAPIController::class,'profile']);
Route::get('/getDetails',[LoginAPIController::class,'getDetails']);
Route::get('/DetailsEdit',[LoginAPIController::class,'DetailsEdit']);

//Reset Password
Route::get('/sendotp',[OtpController::class,'sendOtp']);
Route::get('/matchotp',[OtpController::class,'matchOtp']);
Route::get('/resetpassword',[OtpController::class,'resetPassword']);

//UPDATE
Route::post('/userUpdate',[LoginAPIController::class,'userUpdate']); 

