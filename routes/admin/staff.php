<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PersonalController;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->group(function() {

    Route::middleware('guest:staff')->group(function () {
        Route::get('/login', [AuthController::class, 'loginForm'])->name('staff.login');
        Route::post('/login', [AuthController::class, 'login'])->name('staff.auth');
    });
});


Route::prefix('staff/cpanel')->middleware(['auth:staff'])->group(function() {

    Route::get('/', [PersonalController::class, 'showControlPanel'])->name('control-panel');

});
