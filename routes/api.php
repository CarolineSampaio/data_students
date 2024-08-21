<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('alunos', StudentController::class);


// Rotas protegidas por autenticação
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });