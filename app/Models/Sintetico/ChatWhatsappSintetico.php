<?php

namespace App\Models\Sintetico;

use SmartNx\Models\BaseModel;

class ChatWhatsappSintetico extends BaseModel
{
    protected $connection = 'tokudb';

    protected $table = 'chat_whatsapp_sintetico';
    protected $fillable = ['mes', 'qtd', 'situacao'];

    public $timestamps = false;
}
