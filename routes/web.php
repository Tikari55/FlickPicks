<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/search', [MovieController::class, 'search'])->name('movies.search');



