<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = ['id','especialista','admin','imagem',];p

    public $rules = [
        'nome' => 'required|min:3|max:200',
        'autor' => 'required|min:3|max:100',
        'preparo' => 'required|min:10|max:3000',
        ];
    public $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínio 3 caracteres',
            'autor.required' => 'O campo categoria é obrigatório',
            'nome.min' => 'O campo autor deve ter no mínio 3 caracteres',
            'preparo.required' => 'Você deve escrever o modo de preparo da receita',
            'preparo.min' => 'A receita deve ter no mínimo 10 caracteres',
            ];
}