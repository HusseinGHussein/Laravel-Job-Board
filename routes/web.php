<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/new', [\App\Http\Controllers\ListingController::class, 'create'])
    ->name('listings.create');

Route::post('/new', [\App\Http\Controllers\ListingController::class, 'store'])
    ->name('listings.store');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'listings' => request()->user()->listings
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/{listing:slug}', [\App\Http\Controllers\ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing:slug}/apply', [\App\Http\Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');