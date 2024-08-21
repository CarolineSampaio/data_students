<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('alunos', StudentController::class);
