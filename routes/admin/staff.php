<?php

use App\Http\Controllers\Admin\PersonalController;
use Illuminate\Support\Facades\Route;


Route::prefix('staff/cpanel')->middleware(['auth:staff'])->group(function() {

    Route::get('/', [PersonalController::class, 'showControlPanel'])->name('control-panel');

});
