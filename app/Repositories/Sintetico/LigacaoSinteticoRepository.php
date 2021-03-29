<?php

namespace App\Repositories\Sintetico;

use App\Models\Sintetico\LigacaoSintetico;
use SmartNx\Repositories\BaseRepository;

class LigacaoSinteticoRepository extends BaseRepository
{
    public function __construct(LigacaoSintetico $model)
    {
        parent::__construct($model);
    }

    public function dataPie()
    {
        $finalizadas = $this->model->select('mes', 'qtd')
            ->where('situacao', '=', 'FINALIZADAS')
            ->orderBy('mes', 'asc')->get()->toJson();

        $recusadas = $this->model->select('mes', 'qtd')
            ->where('situacao', '=', 'RECUSADAS')
            ->orderBy('mes', 'asc')->get()->toJson();

        $naoAtendidas = $this->model->select('mes', 'qtd')
            ->where('situacao', '=', 'NAO_ATENDIDAS')
            ->orderBy('mes', 'asc')->get()->toJson();

        return compact('finalizadas', 'recusadas', 'naoAtendidas');
    }
}
