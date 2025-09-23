<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('/');
Route::get('/activity-details/{id}',[HomeController::class,'activityDetails'])->name('activity-details');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::post('/save-project',[HomeController::class,'saveProject'])->name('save-project');
Route::post('/edit-project',[HomeController::class,'editProject'])->name('edit-project');
Route::post('/save',[HomeController::class,'save'])->name('save');
Route::post('/update-status', [HomeController::class, 'updateStatus'])->name('update-status');
Route::post('/close-project',[HomeController::class,'closeProject'])->name('close-project');
//prevent login page if already logged in
Route::middleware('guest')->group(function () {
    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::post('/auth',[HomeController::class,'auth'])->name('auth')->middleware('throttle:5,1');
});
//middleware
Route::middleware('check.user')->group(function(){
    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
});
//api
Route::middleware('api')->group(function () {
    //bur
    Route::get('icare', [ApiController::class, 'ICare']);
    Route::get('sinulid', [ApiController::class, 'Sinulid']);
    Route::get('sagip', [ApiController::class, 'Sagip']);
    Route::get('lingap', [ApiController::class, 'Lingap']);
    Route::get('isshed', [ApiController::class, 'Isshed']);
    Route::get('ux', [ApiController::class, 'Ux']);
    Route::get('gentri', [ApiController::class, 'Gentri']);
    Route::get('okdeped', [ApiController::class, 'OkDepEd']);
    Route::get('secure', [ApiController::class, 'Secure']);
    Route::get('drrm', [ApiController::class, 'DRRM']);
    Route::get('humane', [ApiController::class, 'Humane']);
    Route::get('qms', [ApiController::class, 'QMS']);
    //timeliness
    Route::get('timeliness-icare',[ApiController::class,'ICareTimeLine']);
    Route::get('timeliness-sinulid',[ApiController::class,'SinulidTimeLine']);
    Route::get('timeliness-sagip',[ApiController::class,'SagipTimeLine']);
    Route::get('timeliness-lingap',[ApiController::class,'LingapTimeLine']);
    Route::get('timeliness-isshed',[ApiController::class,'IsshedTimeLine']);
    Route::get('timeliness-ux',[ApiController::class,'UXTimeLine']);
    Route::get('timeliness-gentri',[ApiController::class,'GentriTimeLine']);
    Route::get('timeliness-okdeped',[ApiController::class,'OkDepEdTimeLine']);
    Route::get('timeliness-secure',[ApiController::class,'SecureTimeLine']);
    Route::get('timeliness-drrm',[ApiController::class,'DRRMTimeLine']);
    Route::get('timeliness-humane',[ApiController::class,'HumaneTimeLine']);
    Route::get('timeliness-qms',[ApiController::class,'QMSTimeLine']);
});