<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAcessoArtigo extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = ['id', 'artigo_id', 'user_id', 'data',];
}
