<?php

use App\Http\Controllers\Panel\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\UserController;


// Route::get('panel/users', [UserController::class, 'index'])->name('users.index');
// Route::get('panel/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('panel/users', [UserController::class, 'store'])->name('users.store');

Route::middleware(['auth', 'IsAdmin'])->resource('/panel/users', UserController::class)->except(['show', 'delete']);
//Route::delete('/panel/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::middleware(['auth', 'IsAdmin'])->resource('/panel/categories', CategoryController::class)->except(['show', 'delete']);
