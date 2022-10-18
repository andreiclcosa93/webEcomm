<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;


Route::prefix('staff/cpanel/users')->middleware(['auth:staff', 'manager'])->group(function() {

    // display users
    Route::get('/show', [UsersController::class, 'showUsers'])->name('show.users');

});
