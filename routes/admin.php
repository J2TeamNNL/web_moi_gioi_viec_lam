<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.master');
})->name('welcome');

Route::group([
    'as'     => 'users.',
    'prefix' => 'users',
], static function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});
Route::group([
    'as'     => 'posts.',
    'prefix' => 'posts',
], static function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/import-csv', [PostController::class, 'importCsv'])->name('import_csv');
});
