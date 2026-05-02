<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookLogController;
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

Route::resource('booklogs', BookLogController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
