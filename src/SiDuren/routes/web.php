<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/archive');
});

// Route::get('/archive', function () {
//     return view('pages.archives.index');
// });

// Route::resource('category', CategoryController::class);
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

// Route::resource('archive', ArchiveController::class);
Route::prefix('archive')->name('category.')->group(function () {
    Route::get('/', [ArchiveController::class, 'index'])->name('index');
    Route::get('/create', [ArchiveController::class, 'create'])->name('create');
    Route::post('/', [ArchiveController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ArchiveController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ArchiveController::class, 'update'])->name('update');
    Route::delete('/{id}', [ArchiveController::class, 'destroy'])->name('destroy');
    Route::get('/{id}', [ArchiveController::class, 'show'])->name('show');
});


