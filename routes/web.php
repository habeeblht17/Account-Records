<?php

use App\Http\Livewire\Assets;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/livewire-charts', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/assets', Assets::class)->name('assets');
});
