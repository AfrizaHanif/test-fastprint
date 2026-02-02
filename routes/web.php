<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::post('/refresh', [MainController::class, 'refresh'])->name('main.refresh');
Route::resource('data', DataController::class)->except(['index', 'create', 'edit']);
Route::post('/data/delete-all', [DataController::class, 'delete_all'])->name('data.delete-all');

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
Route::get('/logs', [SettingController::class, 'logs'])->name('settings.logs');
