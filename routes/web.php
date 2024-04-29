<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
    // Legal case
    Route::post('/store', [LegalCaseController::class, 'store'])->name('store');
});
//Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// -
Route::get('/lawyers', function(){
    return view('');
})->name('lawyers');

//Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
