<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');

  Route::resource('notes', 'NotesController');
});
