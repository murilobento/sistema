@extends('layouts.app') 

@section('content')
<div class="be-content">
    <div class="main-content container-fluid">              
        <div class="row">
            @if(Session::has('mensagem_sucesso'))
            <div class="form-group col-lg-12">
                <div role="alert" class="alert alert-success alert-icon alert-icon-border alert-dismissible">
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message">                        
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true" class="mdi mdi-close"></span></button>{{ Session::get('mensagem_sucesso') }}

                    </div>
                </div>
            </div>
            @endif
            <div class="col-sm-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    @if(Request::is('*/editar')) 
                    {!! Form::model($categoria, ['method' => 'PATCH', 'url' => 'categoria/'.$categoria->id]) !!}
                    <div class="panel-heading panel-heading-divider">Edição de Categoria<span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">
                         @if (count($errors) > 0)
                        <div role="alert" class="alert alert-danger alert-icon alert-icon-border alert-dismissible">
                            <div class="icon"><span class="mdi mdi-close"></span></div>
                                <div class="message">   
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>                                
                            </div>
                        @endif
                        <div class="form-group col-sm-12">
                            <label>Categoria <i class="txt-red">*</i></label>
                            {!!Form::text('categoria', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a categoria'])!!}
                        </div>
                        
                        <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Editar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('categoria/listar') }}">Voltar</a>                                    
                            </p>
                        </div>
                        {!! Form::close() !!}
                    </div>                    
                    @else
                    <div class="panel-heading panel-heading-divider">Cadastros de Categoria<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-default" href="{{ url('categoria/listar') }}">Ver Categorias Cadastradas</a></span><span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">                            
                        {!! Form::open(['url' => 'categoria/salvar']) !!} 
                        @if (count($errors) > 0)
                        <div role="alert" class="alert alert-danger alert-icon alert-icon-border alert-dismissible">
                            <div class="icon"><span class="mdi mdi-close"></span></div>
                                <div class="message">   
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>                                
                            </div>
                        @endif
                        <div class="form-group col-sm-12">
                            <label>Categoria <i class="txt-red">*</i></label>
                            {!!Form::text('categoria', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a categoria', 'autofocus'])!!}
                        </div>                        
                        <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-space btn-success']) !!}
                                {!! Form::reset('Limpar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('categoria/listar') }}">Voltar</a> 
                            </p>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>            
        </div>            
    </div>
</div> 
@endsection