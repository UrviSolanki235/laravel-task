<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('pages')
    ->name('pages.')
    ->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index'); // List all pages
        Route::get('{slug}', [PageController::class, 'show'])->name('show'); // Show a single page by slug
        Route::post('/', [PageController::class, 'store'])->name('store'); // Create a new page
        Route::put('{slug}', [PageController::class, 'update'])->name('update'); // Update page by slug
        Route::delete('{slug}', [PageController::class, 'destroy'])->name('destroy'); // Delete page by slug
    });

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
