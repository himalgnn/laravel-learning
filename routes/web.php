<?php

use App\Http\Controllers\Backend\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('backend.showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('backend.login');


// Route::get('/login', function () {
//     return view('backend.user.login');
// });

Route::get('/register', [AuthController::class, 'showRegister'])->name('backend.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('backend.register');


Route::get('/forgot', [AuthController::class, 'showForgotPassword'])->name('backend.showForgotPassword');
Route::post('/forgot', [AuthController::class, 'forgotpassword'])->name('backend.forgotpassword');



Route::get('/backend/dashboard', function () {
    return view('backend.dashboard.index');     
});
Route::get('/backend/category/create', function () {
    return view('backend.category.create');
});
Route::get('/backend/category', function () {
    return view('backend.category.index');
});