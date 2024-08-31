<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
})->middleware('auth');


Route::get('/registro', [RegistroController::class,'index'])->name('registro');
Route::post('/registro', [RegistroController::class,'store']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/{user:name}', [HomeController::class,'index'])->name('home.index')->middleware('auth');


Route::get('/courses/interest/{id}', [CoursesController::class, 'index']);