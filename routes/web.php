<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;




Route::get('/', ([DashboardController::class, 'home']));

Route::get('/register',([FormController::class,'register']));

Route::post('/welcome',([FormController::class,'welcome']));

Route::get('/master', function () {
    return view('layouts.master');
});

Route::middleware(['auth',IsAdmin::class])->group(function () {
    //CRUD GENRE
    Route::get('/genre/create',[GenreController::class,'create']);
    Route::post('genre', [GenreController::class, 'store']);  
    
    Route::get('/genre/{id}/edit',[GenreController::class,'edit']);
    Route::put('/genre/{id}',[GenreController::class,'update']);

    Route::delete('/genre/{id}',[GenreController::class,'destroy']);
});
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}',[GenreController::class,'show']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/profile', [AuthController::class, 'getProfile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');
Route::post('/comments/{book_id}',[CommentController::class, 'store'])->middleware('auth');
//CRUD BOOK
Route ::resource('book', BookController::class);
//auth
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerUser']);
//login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);
