<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;

// Route mặc định cho trang index
Route::get('/', [IssuesController::class, 'index'])->name('home');

// Route group cho Issues
Route::prefix('issues')->name('Issues.')->group(function () {
    Route::get('/', [IssuesController::class, 'index'])->name('index');
    Route::get('/create', [IssuesController::class, 'create'])->name('create');
    Route::post('/', [IssuesController::class, 'store'])->name('store');
    Route::get('/{Issue}/edit', [IssuesController::class, 'edit'])->name('edit');
    Route::put('/{Issue}', [IssuesController::class, 'update'])->name('update');
    Route::delete('/{Issue}', [IssuesController::class, 'destroy'])->name('destroy');
});
