<?php

use App\Http\Controllers\PagesController;
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

Route::get('/index', function() {
    return view('welcome');
});

Route::get('/profile',[PagesController::class, 'profile'])->name('profile');
Route::get('/login',[PagesController::class, 'loginPage'])->name('login');


Route::get('/',[PagesController::class, 'home'])->name('home');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/service',[PagesController::class, 'service'])->name('service');
Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/ourteam',[PagesController::class, 'ourteam'])->name('ourteam');
