<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


Route::get('/', ([DashboardController::class, 'home']));

Route::get('/register',([FormController::class,'register']));

Route::post('/welcome',([FormController::class,'welcome']));

Route::get('/master', function () {
    return view('layouts.master');
});
Route::get('/genre', [GenreController::class, 'index']);

Route::get('/genre/create',[GenreController::class,'create']);
Route::post('genre', [GenreController::class, 'store']);    
Route::get('/genre/{id}',[GenreController::class,'show']);
Route::get('/genre/{id}/edit',[GenreController::class,'edit']);
Route::put('/genre/{id}',[GenreController::class,'update']);
Route::delete('/genre/{id}',[GenreController::class,'destroy']);
//CRUD BOOK
Route ::resource('book', BookController::class);
//auth
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerUser']);
//login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'loginUser']);
//logout
Route::post('/logout', [AuthController::class, 'logout']);