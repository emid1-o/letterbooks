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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::post('/booklogs/{booklog}/like', [App\Http\Controllers\BookLogController::class, 'toggleLike'])->name('booklogs.like');
    
    Route::get('/booklogs/all', [App\Http\Controllers\BookLogController::class, 'all'])->name('booklogs.all');
    Route::resource('booklogs', App\Http\Controllers\BookLogController::class)->except(['show']);
    Route::resource('booklists', App\Http\Controllers\BookListController::class);
});

require __DIR__.'/auth.php';
