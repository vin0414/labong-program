<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('/');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::post('/save-project',[HomeController::class,'saveProject'])->name('save-project');

//prevent login page if already logged in
Route::middleware('guest')->group(function () {
    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::post('/auth',[HomeController::class,'auth'])->name('auth')->middleware('throttle:5,1');
});

//protected routes
Route::get('/activity-details/{id}',[HomeController::class,'activityDetails'])->name('activity-details');