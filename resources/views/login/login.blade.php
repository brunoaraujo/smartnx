@extends('layouts.empty')

@section('content')
    <div class="login login-with-news-feed">
        <div class="news-feed">
            <div class="news-image" style="background-image: url(https://www.smartnx.com/site20/wp-content/uploads/2020/05/12.png)"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b>{{env('APP_NAME')}}</b></h4>
                <p>@copyright todos os direitos reservados.</p>
            </div>
        </div>
        <div class="right-content">
            <div class="login-header">
                <div class="brand">
                    <img src="https://d335luupugsy2.cloudfront.net/images/landing_page/96622/smart-nx.png"/>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in-alt"></i>
                </div>
            </div>
            <div class="login-content">
                <form action="{{url('/login')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        {!! Form::text('cpf', old('cpf'), array('placeholder' => 'CPF', 'id' => 'cpf', 'class'=>'form-control form-control-lg inverse-mode '.($errors->has('password') ? 'is-invalid' : ''), 'autofocus' => 'autofocus')) !!}
                        @if ($errors->has('cpf')) <p class="invalid-feedback">{{ $errors->first('cpf') }}</p> @endif
                    </div>
                    <div class="form-group">
                        {!! Form::password('senha', array('placeholder' => 'Senha', 'class'=>'form-control form-control-lg inverse-mode '.($errors->has('senha') ? 'is-invalid' : ''))) !!}
                        @if ($errors->has('senha')) <p class="invalid-feedback">{{ $errors->first('senha') }}</p> @endif
                    </div>
                    <div class="checkbox checkbox-css m-b-30">
                        <input type="checkbox" id="remember_me_checkbox" value="" />
                        <label for="remember_me_checkbox">Lembrar-me</label>
                    </div>
                    <button class="btn btn-success btn-block btn-lg" type="submit">Acessar</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cpf").mask("999.999.999-99", {});
        });
    </script>
@endsection
