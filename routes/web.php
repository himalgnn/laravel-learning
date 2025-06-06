<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
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


Route::post('/logout', [AuthController::class, 'logout'])->name('backend.logout');


Route::get('/forgot', [AuthController::class, 'showForgotPassword'])->name('backend.showForgotPassword');
Route::post('/forgot', [AuthController::class, 'forgotpassword'])->name('backend.forgotpassword');

Route::get('/backend/dashboard', [AuthController::class, 'showDashboard'])->name('backend.showDashboard');


Route::prefix('backend/')->name('backend.')->group(function (){
    Route::resource('setting', SettingController::class)->only([
        'create', 'store', 'update', 'edit'
    ]);
});

Route::get('/backend/category/create', function () {
    return view('backend.category.create');
});
Route::get('/backend/category', function () {
    return view('backend.category.index');
});