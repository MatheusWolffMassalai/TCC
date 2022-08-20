<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topicos_artigos extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'texto',
        'artigo_id',
        'titulo',
        'imagem',
    
    ];
}
