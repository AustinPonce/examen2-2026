<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

// POST http://localhost:8000/api/materiales
Route::post('/materiales', [MaterialController::class, 'store']);

// PUT http://localhost:8000/api/materiales/{id}
Route::put('/materiales/{id}', [MaterialController::class, 'update']);
