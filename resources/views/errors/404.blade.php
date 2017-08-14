@extends('layouts.app') 

@section('content')
<div class="be-error be-error-404">

        <div class="main-content container-fluid">
          <div class="error-container">
            <div class="error-number">404</div>
            <div class="error-description">Ops! A página que você está procurando não existe, ou pode ter sido removida.</div>
            <div class="error-goback-text">Deseja voltar ao sistema?</div>
            <div class="error-goback-button"><a onclick="history.back()" class="btn btn-xl btn-primary">Clique aqui</a></div>
            <div class="footer">&copy; 2016 </div>
          </div>
        </div>

    </div>

@endsection