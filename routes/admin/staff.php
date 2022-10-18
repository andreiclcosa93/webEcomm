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


    //adding a staff member
    Route::get('/staff/new', [ManagerController::class, 'newStaff'])->name('new.staff');
    Route::post('/staff/new', [ManagerController::class, 'createStaff'])->name('create.staff');

    //editing the data of a staff member
    Route::get('/staff/edit/{id}', [ManagerController::class, 'editStaff'])->name('edit.staff');
    Route::put('/staff/edit/{id}', [ManagerController::class, 'updateStaff'])->name('update.staff');

    // changing the password of a staff member
    Route::put('/staff/edit/pass/{id}', [ManagerController::class, 'updatePassword'])->name('password.staff');

    //block staff member
    Route::delete('/staff/block/{id}', [ManagerController::class, 'blockStaff'])->name('block.staff');

    // unlocking the member
    Route::put('/staff/restore/{id}', [ManagerController::class, 'restoreStaff'])->name('restore.staff');

    // delete permanent
    Route::delete('/staff/remove/{id}', [ManagerController::class, 'removeStaff'])->name('remove.staff');
});
