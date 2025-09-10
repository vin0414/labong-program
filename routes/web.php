<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('/');
Route::middleware('guest')->group(function () {
    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::post('/auth',[HomeController::class,'auth'])->name('auth')->middleware('throttle:5,1');
});
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::post('/save-project',[HomeController::class,'saveProject'])->name('save-project');
//protected routes
Route::middleware('auth')->group(function () {
    Route::get('/edit-project/{id}',[HomeController::class,'editProject'])->name('edit-project');
    Route::post('/view-project/{id}',[HomeController::class,'viewProject'])->name('view-project');
    Route::get('/delete-project/{id}',[HomeController::class,'deleteProject'])->name('delete-project');
});