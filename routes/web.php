<?php

<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MainViewController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/admin', [MenuController::class, 'index']);
Route::post('/admin', [MenuController::class, 'store']);
Route::put('/admin/{id}', [MenuController::class, 'update']);
Route::delete('/admin/{id}', [MenuController::class, 'destroy'])->name('menu.delete');

// Route::get('/mainView', function () {
//     return view('mainView');
// });

Route::get('/mainView', [MainViewController::class, 'index'])->name('mainView');
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/create', function () {
    return view('create');
})
    ->middleware(['auth', 'verified'])
    ->name('create');

Route::get('/dashboard', [MenuController::class, 'index'], function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/dashboard', [MenuController::class, 'store']);
    Route::get('/dashboard/{menu}/edit', [MenuController::class, 'edit']);
    Route::put('/dashboard/{menu}/update', [MenuController::class, 'update']);
    Route::delete('/dashboard/{menu}/delete', [MenuController::class, 'destroy']);
});
// Route::middleware('auth')->group(function () {
//     // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
>>>>>>> new-back
