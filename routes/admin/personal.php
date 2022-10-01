<?php

use App\Http\Controllers\Admin\PersonalController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/cpanel')->group(function() {

    Route::get('/', [PersonalController::class, 'showControlPanel'])->name('control-panel');

});
