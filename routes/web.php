<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookLogController;
use App\Http\Controllers\BookListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('booklogs.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/booklogs/all', [BookLogController::class, 'all'])
    ->name('booklogs.all')
    ->middleware(['auth', 'verified']);

Route::resource('booklists', BookListController::class)
    ->only(['index', 'create', 'store', 'show', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('booklogs', BookLogController::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/update-goal', [BookLogController::class, 'updateGoal'])->name('user.updateGoal');
});

require __DIR__.'/auth.php';
