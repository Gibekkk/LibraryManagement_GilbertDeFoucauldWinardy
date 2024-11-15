<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\JournalsController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\FinalYearProjectController;
use App\Http\Controllers\NewspaperController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'App\Http\Middleware\LevelCheck:admin,librarian'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin,librarian'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books/{sort?}', [BooksController::class, 'index'])->name('books');
    Route::get('/journals/{sort?}', [JournalsController::class, 'index'])->name('journals');
    Route::get('/cds/{sort?}', [CDController::class, 'index'])->name('cds');
    Route::get('/final_year_projects/{sort?}', [FinalYearProjectController::class, 'index'])->name('final_year_projects');
    Route::get('/newspapers/{sort?}', [NewspaperController::class, 'index'])->name('newspapers');
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin'])->group(function () {
    Route::get('/librarians', function () {
        return view('admin.userPage');
    });
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:librarian'])->group(function () {
    Route::get('/display', function () {
        redirect('books');
    })->name('display');
});


require __DIR__ . '/auth.php';
