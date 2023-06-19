<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return redirect()->route('movies.search');
});

Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movies/{movie}',[MovieController::class, 'show'])->name('movies.show');



