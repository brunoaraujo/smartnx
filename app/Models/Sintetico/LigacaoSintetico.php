<?php

namespace App\Models\Sintetico;

use SmartNx\Models\BaseModel;

class LigacaoSintetico extends BaseModel
{
    protected $connection = 'tokudb';

    protected $table = 'ligacao_sintetico';
    protected $fillable = ['mes', 'qtd', 'situacao'];

    public $timestamps = false;
}
