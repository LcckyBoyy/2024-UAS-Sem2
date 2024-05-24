<?php

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