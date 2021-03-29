<?php

namespace App\Repositories\Sintetico;

use App\Models\Sintetico\ChatWebSintetico;
use SmartNx\Repositories\BaseRepository;

class ChatWebSinteticoRepository extends BaseRepository
{
    public function __construct(ChatWebSintetico $model)
    {
        parent::__construct($model);
    }

    public function dataPie()
    {
        $finalizados = $this->model->select('mes', 'qtd')
            ->where('situacao', '=', 'FINALIZADOS')
            ->orderBy('mes', 'asc')->get()->toJson();

        $abandonados = $this->model->select('mes', 'qtd')
            ->where('situacao', '=', 'ABANDONADOS')
            ->orderBy('mes', 'asc')->get()->toJson();

        return compact('finalizados', 'abandonados');
    }
}
