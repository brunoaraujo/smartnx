<?php

namespace App\Models;

use SmartNx\Models\BaseModel;

class Operador extends BaseModel
{
    protected $table = 'operador';
    protected $fillable = ['nome', 'cpf', 'senha'];

    public $timestamps = false;
}
