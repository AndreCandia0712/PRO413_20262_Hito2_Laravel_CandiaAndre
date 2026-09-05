<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FutbolistaController;

Route::get('/', [FutbolistaController::class, 'index'])->name('futbolistas.index');
Route::post('/futbolistas', [FutbolistaController::class, 'store'])->name('futbolistas.store');
