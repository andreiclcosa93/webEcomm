<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\PersonalController;

Route::prefix('staff')->group(function() {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'loginForm'])->name('staff.login');
        Route::post('/login', [AuthController::class, 'login'])->name('staff.auth');
    });
});


Route::prefix('staff/cpanel')->middleware(['auth:staff'])->group(function() {

    Route::get('/', [PersonalController::class, 'showControlPanel'])->name('control-panel');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout-staff');

});


Route::prefix('staff/cpanel/manager')->middleware(['auth:staff', 'manager'])->group(function() {

    Route::get('/staff', [ManagerController::class, 'showStaff'])->name('show.staff');
    Route::get('/staff/new', [ManagerController::class, 'newStaff'])->name('new.staff');


});
