<?php

use App\Http\Controllers\Admin\ExeptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {

    Route::prefix('exceptions/')->group(function() {
        Route::get('/', [ExeptionController::class, 'index'])->name('exceptions.index');
        Route::get('/show/{trackingcode}', [ExeptionController::class, 'show'])->name('exceptions.show');
    });

});

require __DIR__.'/auth.php';


