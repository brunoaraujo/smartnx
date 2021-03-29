<?php

namespace App\Console\Commands;

use App\Models\ChatWhatsappSintetico;
use App\Repositories\DataSinteticoRepository;
use App\Repositories\Sintetico\ChatWebSinteticoRepository;
use App\Repositories\Sintetico\ChatWhastappSinteticoRepository;
use App\Repositories\Sintetico\LigacaoSinteticoRepository;
use Illuminate\Console\Command;
use DB;

class SyntheticDataCommand extends Command
{
    protected $signature = 'smartnx:sync';

    protected $description = 'Sicronização dedados para criação dos relatórios em alta performace';

    protected $chatWebSinteticoRepository;
    protected $chatWhastappSinteticoRepository;
    protected $ligacaoSinteticoRepository;

    public function __construct(
        ChatWebSinteticoRepository $chatWebSinteticoRepository,
        ChatWhastappSinteticoRepository $chatWhastappSinteticoRepository,
        LigacaoSinteticoRepository $ligacaoSinteticoRepository
    )
    {
        parent::__construct();

        $this->chatWebSinteticoRepository = $chatWebSinteticoRepository;
        $this->chatWhastappSinteticoRepository = $chatWhastappSinteticoRepository;
        $this->ligacaoSinteticoRepository = $ligacaoSinteticoRepository;
    }

    public function handle()
    {
        $this->transferLigacao();
        $this->transferChatWeb();
        $this->transferChatWhatsapp();
    }

    private function transferLigacao()
    {
        $data = DB::select("
            SELECT
                to_char(data_hora_inicio, 'MM/YYYY') as mes,
                count(*) as qtd,
                CASE
                    WHEN status = 1 THEN 'FINALIZADAS'
                    WHEN status = 2 THEN 'RECUSADAS'
                    WHEN status = 3 THEN 'NAO_ATENDIDAS'
                END as situacao
            FROM
                ligacao
            GROUP BY
                mes, situacao
        ");

        $this->ligacaoSinteticoRepository->truncate();

        foreach ($data as $row)
        {
            $this->ligacaoSinteticoRepository->create(
                [
                    'mes' => $row->mes,
                    'qtd' => $row->qtd,
                    'situacao' => $row->situacao,
                ]
            );
        }
    }

    private function transferChatWeb()
    {
        $data = DB::select("
            SELECT
                to_char(data_hora_inicio, 'MM-YYYY') as mes,
                count(*) as qtd,
                CASE WHEN status = 1 THEN 'FINALIZADOS' ELSE 'ABANDONADOS' END as situacao
            FROM
                chat_web
            GROUP BY 
                mes, situacao
        ");

        $this->chatWebSinteticoRepository->truncate();

        foreach ($data as $row)
        {
            $this->chatWebSinteticoRepository->create(
                [
                    'mes' => $row->mes,
                    'qtd' => $row->qtd,
                    'situacao' => $row->situacao,
                ]
            );
        }
    }

    private function transferChatWhatsapp()
    {
        $data = DB::select("
            SELECT 
                to_char(data_hora_inicio, 'MM-YYYY') as mes,
                count(*) as qtd,
                CASE WHEN status = 1 THEN 'FINALIZADOS' ELSE 'ABANDONADOS' END as situacao
            FROM
                chat_whatsapp
            GROUP BY 
                mes, situacao
        ");

        $this->chatWhastappSinteticoRepository->truncate();

        foreach ($data as $row)
        {
            $this->chatWhastappSinteticoRepository->create(
                [
                    'mes' => $row->mes,
                    'qtd' => $row->qtd,
                    'situacao' => $row->situacao,
                ]
            );
        }
    }
}
