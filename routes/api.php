<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::post('alunos', [StudentController::class, 'store']);
Route::get('alunos', [StudentController::class, 'index']);

// Rotas protegidas por autenticação
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });