<?php

namespace App\Repositories;

use App\Models\Operador;
use SmartNx\Repositories\BaseRepository;

class OperadorRepository extends BaseRepository
{
    public function __construct(Operador $model)
    {
        parent::__construct($model);
    }
}
