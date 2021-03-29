@extends('layouts.default')

@section('content')
    <h1 class="page-header">CADASTRO DE OPERADOR</h1>
    <div class="panel panel-primary">
        <div class="panel-body">
            {!! Form::open(["route" => 'register.operator.create', "method" => "POST", "id" => "form", "role" => "form"]) !!}
                @include('operator.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
