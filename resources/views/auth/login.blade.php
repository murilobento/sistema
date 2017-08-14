@extends('layouts.app')

@section('content')

@if (Route::has('login'))

      <div class="main-content container-fluid">
        <div class="splash-container">
          <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading"><img src="{{asset('img/logo-xx.png')}}" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">Por favor, entre com seus dados abaixo.</span></div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail">
                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input id="password" type="password" class="form-control input-sm" name="password" placeholder="Digite sua senha">
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>                    
                <div class="form-group login-submit">
                  <button data-dismiss="modal" type="submit" class="btn btn-primary btn-space">Entrar</button>
                </div>
              </form>
            </div>
          </div>                
          <div class="splash-footer"><span>Não tem uma conta? <a href="{{ url('/register') }}">Clique aqui</a></span></div>
        </div>
      </div>

  @endif
@endsection

