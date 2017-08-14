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
                    {!! Form::model($subcategoria, ['method' => 'PATCH', 'url' => 'subcategoria/'.$subcategoria->id]) !!}
                    <div class="panel-heading panel-heading-divider">Edição de Subcategoria<span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
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
                        <?php if(count($categorias) == 0){ ?>
                            <div class="alert alert-dismissible alert-danger">
                                <strong>OPS!</strong> Primeiramente, cadastre uma categoria! <strong><a href="{{ url('categoria/adicionar') }}" class="alert-link">Clicando aqui.</a> </strong>
                            </div> 
                        <?php } else { ?>
                            <div class="form-group col-sm-6">
                                <label>Subcategoria <i class="txt-red">*</i></label>
                                {!!Form::text('subcategoria', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a subcategoria', 'autofocus'])!!}
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Categoria <i class="txt-red">*</i></label>  
                                <select name="cat_id" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" 
                                            @if($subcategoria->cat_id==$categoria->id) selected="selected" @endif>{{ $categoria->categoria }}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>                         
                            <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Editar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('subcategoria/listar') }}">Voltar</a> 
                            </p>
                        </div>
                        </div>
                        <?php } ?>
                        {!! Form::close() !!}
                    </div>                    
                    @else
                    <div class="panel-heading panel-heading-divider">Cadastros de Subcategoria<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-default" href="{{ url('subcategoria/listar') }}">Ver Subcategorias Cadastradas</a></span><span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">                            
                        {!! Form::open(['url' => 'subcategoria/salvar']) !!} 
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
                        <?php if(count($categorias) == 0){ ?>
                            <div class="alert alert-dismissible alert-danger">
                                <strong>OPS!</strong> Primeiramente, cadastre uma categoria! <strong><a href="{{ url('categoria/adicionar') }}" class="alert-link">Clicando aqui.</a> </strong>
                            </div> 
                        <?php } else { ?>
                            <div class="form-group col-sm-6">
                                <label>Subcategoria <i class="txt-red">*</i></label>
                                {!!Form::text('subcategoria', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a subcategoria', 'autofocus'])!!}
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Categoria <i class="txt-red">*</i></label>  
                                <select name="cat_id" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach   
                                </select>
                            </div>                         
                            <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-space btn-success']) !!}
                                {!! Form::reset('Limpar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('subcategoria/listar') }}">Voltar</a> 
                            </p>
                        </div>
                        </div>
                        <?php } ?>
                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>            
        </div>            
    </div>
</div> 
@endsection