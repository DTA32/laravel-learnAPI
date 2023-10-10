<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function(){
    return view('login');
})->name('login');

Route::get("/register", function(){
    return view('register');
})->name('register');

Route::get("/dashboard", function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::post("/auth/register", [AuthController::class, 'register'])->name('auth_register');
Route::post("/auth/login", [AuthController::class, 'login'])->name('auth_login');
Route::get("/auth/logout", [AuthController::class, 'logout'])->name('auth_logout');
Route::get("/auth/google", [AuthController::class, 'google'])->name("auth_google");
Route::get("/auth/google/callback", [AuthController::class, 'googleCallback'])->name("auth_google_callback");
