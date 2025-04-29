<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']) ->name('users.store');
Route::get('/users/create', [UserController::class, 'create']) ->name('users.create');
Route::get('/users', [UserController::class, 'index']) ->name('users.index');

Route::get('/users-edit', function () {
    return "asda";
}) ->name('users.edit'); // temporario

Route::get('/users-show', function () {
    return "asda";
}) ->name('users.show'); // temporario

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
});

require __DIR__.'/auth.php';
