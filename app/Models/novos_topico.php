<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novos_topico extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'texto',
        'artigo_id',
        'titulo',
        'aceito',
        'imagem',
        'artigo_id',
        'aceito',
        'user_id',
        'especialista_id'


    ];
}