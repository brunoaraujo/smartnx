@extends('layouts.default')

@section('content')
    <h1 class="page-header">LIGAÇÕES</h1>
    <div class="row">
        <div class="col-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">FINALIZADA</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartLigacaoFinalizadas" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">RECUSADAS</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartLigacaoRecusadas" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">NÃO ATENDIDDA</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartLigacaoNaoAtendidas" class="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="page-header">CHAT WEB</h1>
    <div class="row">
        <div class="col-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">FINALIZADA</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartChatWebFinalizados" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">ABANDONADOS</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartChatWebAbandonados" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="page-header">CHAT WHATSAPP</h1>
    <div class="row">
        <div class="col-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">FINALIZADA</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartChatWhatsappFinalizados" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">ABANDONADOS</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chartChatWhatsappAbandonados" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .chart {
            width: 100%;
            max-height: 600px;
            height: 35vh;
        }
    </style>
@endsection

@section('js')
    <script src="/assets/plugins/amcharts4/core.js"></script>
    <script src="/assets/plugins/amcharts4/charts.js"></script>
    <script src="/assets/plugins/amcharts4/themes/animated.js"></script>

    <script>
        am4core.useTheme(am4themes_animated);

        var chartLigacaoFinalizadas = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$ligacao["finalizadas"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartLigacaoFinalizadas',  "PieChart3D"
        );

        var chartLigacaoRecusadas = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$ligacao["recusadas"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartLigacaoRecusadas',  "PieChart3D"
        );

        var chartLigacaoNaoAtendidas = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$ligacao["naoAtendidas"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                },]
            }, 'chartLigacaoNaoAtendidas',  "PieChart3D"
        );

        var chartChatWebFinalizados = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$chatWeb["finalizados"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartChatWebFinalizados',  "PieChart3D"
        );

        var chartChatWebAbandonados = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$chatWeb["abandonados"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartChatWebAbandonados',  "PieChart3D"
        );

        var chartChatWhatsappFinalizados = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$chatWhatsapp["finalizados"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartChatWhatsappFinalizados',  "PieChart3D"
        );

        var chartChatWhatsappAbandonados = am4core.createFromConfig(
            {
                "data" : JSON.parse('{!!$chatWhatsapp["abandonados"]!!}'),
                "legend": {},
                "innerRadius": "40%",
                "series": [{
                    "type": "PieSeries3D",
                    "dataFields": {
                        "value": "qtd",
                        "category": "mes"
                    }
                }]
            }, 'chartChatWhatsappAbandonados',  "PieChart3D"
        );
    </script>
@endsection
