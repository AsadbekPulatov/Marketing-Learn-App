<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index'])->name('index');
//Route::get('/service', [ViewController::class, 'service'])->name('service');
//Route::get('/service/{id}', [ViewController::class, 'single'])->name('service.single');
//Route::get('/portfolio', [ViewController::class, 'portfolio'])->name('portfolio');
//Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('lessons', LessonController::class);
});

Route::resource('messages', MessageController::class);
require __DIR__.'/auth.php';
