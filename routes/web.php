<?php

use App\Http\Controllers\HighloadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Livewire\HighloadProgress;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/','welcome');

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/highload', [HighloadController::class, 'create'])->name('highload');
    Route::get('/highloads', [HighloadController::class, 'list'])->name('highloads');
    Route::livewire('/highload-progress', HighloadProgress::class)->name('highload-progress');
    Route::get('/results-list/{highloadId}', [ResultsController::class, 'list'])->name('results-list');
    Route::get('/aggregate-results/{highloadId}', [ResultsController::class, 'aggregate'])->name('aggregate-results');
});
