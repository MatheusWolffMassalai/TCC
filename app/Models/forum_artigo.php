<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum_artigo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [

        'artigo_id',
        'mensagem',
        'user_id'

    ];
}