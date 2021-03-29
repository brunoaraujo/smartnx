<?php

namespace App\Repositories\Sintetico;

use App\Models\Sintetico\ChatWhatsappSintetico;
use SmartNx\Repositories\BaseRepository;

class ChatWhastappSinteticoRepository extends BaseRepository
{
    public function __construct(ChatWhatsappSintetico $model)
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
