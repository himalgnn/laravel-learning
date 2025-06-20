<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TagController;
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

//for category trash
Route::get('/backend/category/trash', [CategoryController::class, 'showTrash'])->name('backend.category.trash');
Route::delete('/category/trash/{category}', [CategoryController::class, 'deleteTrash'])->name('backend.category.deleteTrash');
Route::get('/category/trash/{category}', [CategoryController::class, 'restoreTrash'])->name('backend.category.restoreTrash');


//for category
Route::prefix('backend/')->name('backend.')->group(function (){
    Route::resource('category', CategoryController::class)->only([
        'index','create', 'store', 'update', 'edit', 'destroy', 'show', 'deleteTrash' 
    ]);
});


//for tag trash
Route::get('/backend/tag/trash', [TagController::class, 'showTrash'])->name('backend.tag.trash');
Route::delete('/tag/trash/{tag}', [TagController::class, 'deleteTrash'])->name('backend.tag.deleteTrash');
Route::get('/tag/trash/{tag}', [TagController::class, 'restoreTrash'])->name('backend.tag.restoreTrash');


//for tag
Route::prefix('backend/')->name('backend.')->group(function (){
    Route::resource('tag', TagController::class)->only([
        'index','create', 'store', 'update', 'edit', 'destroy', 'show', 'deleteTrash' 
    ]);
});


