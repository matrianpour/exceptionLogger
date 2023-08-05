<?php

use App\Http\Controllers\App\FatalErrorProviderController;
use App\Http\Controllers\App\ParseErrorProviderController;
use App\Http\Controllers\App\WarningErrorProviderController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //sample routes to provide errors
    Route::get('/parse-error', [ParseErrorProviderController::class, 'parseErrorProvider']);
    Route::get('/fatal-error', [FatalErrorProviderController::class, 'fatalErrorProvider']);
    Route::get('/warning-error', [WarningErrorProviderController::class, 'warningErrorProvider']);
});

require __DIR__.'/auth.php';


