<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = [
        'id_filo',
        'pergunta',
        'resposta_certa',
        'resposta_errada1',
        'resposta_errada2',
        'resposta_errada3',

    ];
}