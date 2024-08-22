<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Documentação API Alunos", version="0.1")
 * @OA\Tag(name="Alunos")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
