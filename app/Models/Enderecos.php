<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero'
    ];
}
