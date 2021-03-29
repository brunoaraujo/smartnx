@extends('layouts.default')

@section('content')
    <div class="float-xl-right">{!! $actionButton !!}</div>
    <h1 class="page-header">GERENCIMANETO DE OPERADOR</h1>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Itens cadastrados</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="data-table" class="table table-striped table-bordered table-td-valign-middle width-full">
                <thead>
                <tr>
                    <th class="text-nowrap">Operador</th>
                    <th class="text-nowrap">Cpf</th>
                    <th class="text-nowrap">Senha</th>
                    <th width="85px" class="text-nowrap">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->nome}}</td>
                            <td>{{$row->cpf}}</td>
                            <td>{{$row->senha}}</td>
                            <td>
                                @php
                                    $groupButtons = new \SmartNx\Providers\ActionButton\GroupButton('buttons');
                                    $groupButtons
                                    ->setButton(
                                        new \SmartNx\Providers\ActionButton\Button('', 'register.operator.edit','fa fa-edit','btn btn-xs btn-warning', ['id' => $row->id]),
                                    )->setButton(
                                        new \SmartNx\Providers\ActionButton\Button('','register.operator.delete','fa fa-trash','btn btn-xs btn-danger btn-delete', ['id' => $row->id]),
                                    )
                                @endphp
                                {!! ActionButton::render($groupButtons) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
