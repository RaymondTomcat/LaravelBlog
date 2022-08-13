<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\UserController;


Route::get('panel/users', [UserController::class, 'index'])->name('users.index');
