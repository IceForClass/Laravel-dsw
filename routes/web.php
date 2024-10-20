<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityLinkController; 

Route::get('/', function () {
    return view('welcome');
});

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
->middleware(['auth', 'verified']);

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(middleware: ['auth', 'verified'])
->name('dashboard');

Route::get('/contact', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/myLinks', [CommunityLinkController::class, 'myLinks'])
    ->middleware(['auth', 'verified'])
    ->name('myLinks');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
            