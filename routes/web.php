<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('modules.users.login');
});

Route::get('/content', function () {
    return view('modules.start');
})->name('start');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/first-user', [UsersController::class, 'firstUser']);
