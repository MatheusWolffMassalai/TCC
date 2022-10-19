<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sugestao_edicao extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = ['id', 'id_topico', 'user_id', 'especialista_id', 'texto', 'aceita', 'imagem',];
}