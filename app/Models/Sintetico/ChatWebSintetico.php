<?php

namespace App\Models\Sintetico;

use SmartNx\Models\BaseModel;

class ChatWebSintetico extends BaseModel
{
    protected $connection = 'tokudb';

    protected $table = 'chat_web_sintetico';
    protected $fillable = ['mes', 'qtd', 'situacao'];

    public $timestamps = false;
}
