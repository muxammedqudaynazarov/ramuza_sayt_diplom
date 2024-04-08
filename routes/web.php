<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('/', IndexController::class)->name('index', 'dash');
    Route::resource('files', FileController::class);
    Route::resource('archive', ArchiveController::class);
    Route::get('/antiplag', [ArchiveController::class, 'antiplag']);
});
