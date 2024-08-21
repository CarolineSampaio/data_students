<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'idade',
        'nota_primeiro_semestre',
        'nota_segundo_semestre',
        'nome_professor',
        'numero_sala'
    ];

    protected $casts = [
        'nota_primeiro_semestre' => 'float',
        'nota_segundo_semestre' => 'float',
    ];
}
