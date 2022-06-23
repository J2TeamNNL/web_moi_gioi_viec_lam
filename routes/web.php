<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/test', [TestController::class, 'test']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registering'])->name('registering');
Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');
Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('layout.master');
})->name('welcome');

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, config('app.locales'))) {
        $locale = config('app.fallback_locale');
    }

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');
