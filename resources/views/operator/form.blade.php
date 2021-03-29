<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('nome', 'Nome*', ['class' => 'control-label']) !!}
        <div class="controls">
            {!! Form::text('nome', old('nome'), ['class' => 'form-control inverse-mode '.($errors->has('nome') ? 'is-invalid' : ''), 'id' => 'nome']) !!}
            @if ($errors->has('nome')) <p class="invalid-feedback">{{ $errors->first('nome') }}</p> @endif
        </div>
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('cpf', 'Cpf*', ['class' => 'control-label']) !!}
        <div class="controls">
            {!! Form::text('cpf', old('cpf'), ['id' => 'cpf', 'class' => 'form-control inverse-mode '.($errors->has('cpf') ? 'is-invalid' : ''), 'id' => 'cpf']) !!}
            @if ($errors->has('cpf')) <p class="invalid-feedback">{{ $errors->first('cpf') }}</p> @endif
        </div>
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('senha', 'Senha*', ['class' => 'control-label']) !!}
        <div class="controls">
            {!! Form::text('senha', old('senha'), ['class' => 'form-control inverse-mode '.($errors->has('senha') ? 'is-invalid' : ''), 'id' => 'senha']) !!}
            @if ($errors->has('senha')) <p class="invalid-feedback">{{ $errors->first('senha') }}</p> @endif
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> SALVAR</button>
    </div>
</div>

@section('js')
    <script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cpf").mask("999.999.999-99", {});
        });
    </script>
@endsection
