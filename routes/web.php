<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/index', function() {
    return view('welcome');
});

Route::get('/profilee',[PagesController::class, 'profile'])->name('profile');
Route::get('/login',[PagesController::class, 'loginPage'])->name('login');


Route::get('/',[PagesController::class, 'home'])->name('home');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/service',[PagesController::class, 'service'])->name('service');
Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/ourteam',[PagesController::class, 'ourteam'])->name('ourteam');


Route::get('/basichome',[PagesController::class, 'basicHome'])->name('basicHome');


//value pass by url
Route::get('/user/{id}', function($id) {
    return "<b>Passed : ".$id."<br>";
});

//Student
Route::get('/studentHome',[StudentController::class, 'studentHome'])->name('studentHome')->middleware('loginCheck');
Route::get('/studentList',[StudentController::class, 'studentList'])->name('studentList')->middleware('loginCheck');

Route::get('/createStudent',[StudentController::class, 'createStudent'])->name('createStudent')->middleware('loginCheck');
Route::post('/createStudent',[StudentController::class, 'createStudentSubmitted'])->name('createStudent');

Route::get('/studentEdit/{id}',[StudentController::class, 'studentEdit'])->name('studentEdit')->middleware('loginCheck','adminCheck');
Route::post('/studentEdit',[StudentController::class, 'studentEditSubmitted'])->name('studentEdit');

Route::get('/studentDelete/{id}',[StudentController::class, 'studentDelete'])->name('studentDelete')->middleware('loginCheck','adminCheck');

Route::get('/studentLogin',[StudentController::class, 'studentLogin'])->name('studentLogin');
Route::post('/studentLogin',[StudentController::class, 'studentLoginCheck'])->name('studentLogin');

Route::get('/studentLogout',[StudentController::class, 'studentLogout'])->name('studentLogout');

Route::get('/profile}',[StudentController::class, 'profile'])->name('profile')->middleware('loginCheck');
Route::get('/details/{id}',[StudentController::class, 'details'])->name('details');


Route::get('/profileEdit/{id}',[StudentController::class, 'profileEdit'])->name('profileEdit')->middleware('loginCheck');
Route::post('/profileEdit',[StudentController::class, 'profileEditSubmitted'])->name('profileEdit')->middleware('loginCheck');



