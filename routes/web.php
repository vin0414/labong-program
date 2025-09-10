<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('/');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/auth',[HomeController::class,'auth'])->name('auth')->middleware('throttle:5,1');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::post('/save-project',[HomeController::class,'saveProject'])->name('save-project');