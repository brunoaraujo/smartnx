@extends('layouts.default')

@section('content')
    <h1 class="page-header">EDITAR OPERADOR</h1>
    <div class="panel panel-primary">
        <div class="panel-body">
            {!! Form::model($data, ["route" => ['register.operator.edit', $data->id], "method" => "PUT", "id" => "form", "role" => "form"]) !!}
                @include('operator.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
