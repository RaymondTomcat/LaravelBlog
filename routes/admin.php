<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\UserController;


// Route::get('panel/users', [UserController::class, 'index'])->name('users.index');
// Route::get('panel/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('panel/users', [UserController::class, 'store'])->name('users.store');

Route::resource('/panel/users', UserController::class)->except(['show']);
