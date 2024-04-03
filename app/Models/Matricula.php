<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = "matriculas";
    //app/Models/
    protected $fillable = [
        "curso_id",
        "turma_id",
        "aluno_id",
        "data_matricula",
    ];

    protected $casts = [
        'curso_id'=>'integer',
        'turma_id'=>'integer',
        'aluno_id'=>'integer',
        'data_matricula'=>'date',
    ];
}
