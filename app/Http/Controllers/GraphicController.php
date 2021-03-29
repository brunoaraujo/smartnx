<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Repositories\Sintetico\ChatWebSinteticoRepository;
use App\Repositories\Sintetico\ChatWhastappSinteticoRepository;
use App\Repositories\Sintetico\LigacaoSinteticoRepository;
use ConsoleTVs\Charts\Classes\BaseChart;
use Illuminate\Support\Facades\Cache;
use SmartNx\Controllers\BaseRequest;

use ConsoleTVs\Charts\Classes\Chartjs;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    protected $chatWebSinteticoRepository;
    protected $chatWhastappSinteticoRepository;
    protected $ligacaoSinteticoRepository;

    public function __construct(
        ChatWebSinteticoRepository $chatWebSinteticoRepository,
        ChatWhastappSinteticoRepository $chatWhastappSinteticoRepository,
        LigacaoSinteticoRepository $ligacaoSinteticoRepository
    )
    {
        $this->chatWebSinteticoRepository = $chatWebSinteticoRepository;
        $this->chatWhastappSinteticoRepository = $chatWhastappSinteticoRepository;
        $this->ligacaoSinteticoRepository = $ligacaoSinteticoRepository;
    }

    public function getIndex()
    {
        $chatWeb = $this->chatWebSinteticoRepository->dataPie();
        $chatWhatsapp = $this->chatWhastappSinteticoRepository->dataPie();
        $ligacao = $this->ligacaoSinteticoRepository->dataPie();

        return view('graphic.index', compact('chatWeb', 'chatWhatsapp', 'ligacao'));
    }
}
