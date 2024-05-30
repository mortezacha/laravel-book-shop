<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('my-books')->group(function (){
       Route::get('/',[BookController::class,'index'])->name('my_books.index');
       Route::get('/create',[BookController::class,'create']);
        Route::post('/',[BookController::class,'store'])->name('my_books.store');
        Route::get('/{book}/edit',[BookController::class,'edit'])->name('my_books.edit');
        Route::post('/{book}/update',[BookController::class,'update'])->name('my_books.update');
    });
});

require __DIR__.'/auth.php';
