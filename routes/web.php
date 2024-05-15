<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Models\Lawyer;
use App\Models\LegalCase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/home');
})->name('home');
// Team / Lawyers - page
Route::get('/lawyers', function () {
    $lawyers = Lawyer::all();
    $filePaths = File::glob(public_path('assets/img/team/*.jpg'));
    return view('team', ['lawyers' => $lawyers, 'filePaths' => $filePaths]);
})->name('team');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Legal case
    // Legal case - add - Client feature
    Route::post('/store', [LegalCaseController::class, 'store'])->name('store');


    // Legal case - Lawyer feature
    Route::get('/accept/{id}', [LegalCaseController::class, 'edit'])->name('accept');
    Route::get('/decline/{id}', [LegalCaseController::class, 'edit'])->name('decline');

    // Note
    Route::post('/note/add', [NoteController::class, 'store'])->name('add');
});
// Legal case group
Route::group(['prefix' => 'case', 'middleware' => ['auth']], function () {

    // Legal case - display
    Route::get('/type/{param}', [LegalCaseController::class, 'index'])->name('type');
    Route::get('/status/{param}', [LegalCaseController::class, 'index'])->name('status');
    Route::get('/{param}', [LegalCaseController::class, 'index'])->name('caseall');
    // Legal case - display - one case
    Route::get('/details/{id}', [LegalCaseController::class, 'details'])->name('details');
});
//Route::get('/details/{id}', [LegalCaseController::class, 'details'])->name('details');
Route::get('/test', function () {
    return view('/test');
})->name('test');
Route::get('/panel', [AdminController::class, 'index'])->name('kurcina');
//Route::get('/case/type/{param}', [AdminController::class, 'show'])->name('type');
//Route::get('/case/status/{param}', [AdminController::class, 'show'])->name('status');

//Route::get('/case/{param}', [AdminController::class, 'show'])->name('caseall');
Route::get('/user/{param}', [AdminController::class, 'show'])->name('userall');

Route::post('/user/search', [AdminController::class, 'search'])->name('search');

Route::get('/user/role/{param}', [AdminController::class, 'show'])->name('role');

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}', [AdminController::class, 'update'])->name('save');

Route::get('/test', function () {
    return view('test');
})->name('update');


require __DIR__ . '/auth.php';
