<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

// POST http://localhost:8000/api/materiales
Route::post('/materiales', [MaterialController::class, 'store']);
