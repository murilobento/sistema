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
                    {!! Form::model($produto, ['method' => 'PATCH', 'url' => 'produto/'.$produto->id, 'files' => true]) !!}
                    <div class="panel-heading panel-heading-divider">Edição de Produto<span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
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
                            <label>Nome do Produto <i class="txt-red">*</i></label>
                            {!!Form::text('nome', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o nome do produto', 'autofocus'])!!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Descrição do Produto <i class="txt-red">*</i></label>
                            {{ Form::textarea('descricao', null, array('class'=>'form-control input-sm', 'rows' => '6')) }}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Marca <i class="txt-red">*</i></label>
                            <select name="marca" id="marca" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1">
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}"
                                        @if($produto->marca_id==$marca->id) selected="selected" @endif>{{ $marca->marca }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Categoria <i class="txt-red">*</i></label>
                            <select name="categoria" id="categoria" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        @if($produto->cat_id==$categoria->id) selected="selected" @endif>{{ $categoria->categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Subcategoria <i class="txt-red">*</i></label>
                           <select name="subcategoria" id="subcategoria" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1">
                                @foreach($subcategorias as $subcategoria)
                                    <option value="{{ $subcategoria->id }}"
                                        @if($produto->scat_id==$subcategoria->id) selected="selected" @endif>{{ $subcategoria->subcategoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Valor Pago <i class="txt-red">*</i> - SEPARAR CASAS COM PONTO (.)</label>
                           {!! Form::input('text', 'valorpago', null, ['class'=> 'form-control input-sm', 'id'=>'valorpago', 'placeholder' => 'Sepera as casas com ponto. Ex: 2.50']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Margem de Lucro (%) <i class="txt-red">*</i></label>
                           {!! Form::input('text', 'margem', null, ['class'=> 'form-control input-sm', 'id'=>'margem', 'onblur'=>'calculaMargem()', 'placeholder' => 'Não coloque % no fim']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Valor Venda</label>
                           {!! Form::input('text', 'valorvenda', null, ['class'=> 'form-control input-sm', 'id'=>'valorvenda', 'readonly']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Estoque <i class="txt-red">*</i></label>
                           {!! Form::input('number', 'estoque', null, ['class'=> 'form-control input-sm', 'id'=>'estoque']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Foto <i class="txt-red">*</i></label>
                            {!! Form::input('file', 'foto', null, ['class'=> 'form-control input-sm']) !!}
                            <br>
                            <img name="foto" src="/fotos/produtos/{{ $produto->foto }}" alt="">
                        </div>
                        <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Editar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('produto/listar') }}">Voltar</a>                                    
                            </p>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @else
                    <div class="panel-heading panel-heading-divider">Cadastros de Produto<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-default" href="{{ url('produto/listar') }}">Ver Produtos Cadastradas</a></span><span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'produto/salvar', 'enctype' => 'multipart/form-data']) !!}
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
                            <label>Nome do Produto <i class="txt-red">*</i></label>
                            {!!Form::text('nome', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o nome do produto', 'autofocus'])!!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Descrição do Produto <i class="txt-red">*</i></label>
                            {{ Form::textarea('descricao', null, array('class'=>'form-control input-sm', 'rows' => '6')) }}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Marca <i class="txt-red">*</i></label>
                            {!! Form::select('marca',$marcas,null,['placeholder'=>'Selecione uma marca', 'id'=>'marca', 'class'=>'form-control input-sm']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Categoria <i class="txt-red">*</i></label>
                            {!! Form::select('categoria',$categorias,null,['placeholder'=>'Selecione uma categoria', 'id'=>'categoria', 'class'=>'form-control input-sm', 'required']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Subcategoria <i class="txt-red">*</i></label>
                           {!! Form::select('subcategoria',['placeholder'=>'Selecione uma subcategoria'],null,['id'=>'subcategoria', 'class'=>'form-control input-sm', 'required']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Valor Pago <i class="txt-red">*</i> - SEPARAR CASAS COM PONTO (.)</label>
                           {!! Form::input('text', 'valorpago', null, ['class'=> 'form-control input-sm', 'id'=>'valorpago', 'placeholder' => 'Sepera as casas com ponto. Ex: 2.50']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Margem de Lucro (%) <i class="txt-red">*</i></label>
                           {!! Form::input('text', 'margem', null, ['class'=> 'form-control input-sm', 'id'=>'margem', 'onblur'=>'calculaMargem()', 'placeholder' => 'Não coloque % no fim']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Valor Venda</label>
                           {!! Form::input('text', 'valorvenda', null, ['class'=> 'form-control input-sm', 'id'=>'valorvenda', 'readonly']) !!}
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Estoque <i class="txt-red">*</i></label>
                           {!! Form::input('number', 'estoque', null, ['class'=> 'form-control input-sm', 'id'=>'estoque']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Foto <i class="txt-red">*</i></label>
                           {!! Form::input('file', 'foto', null, ['class'=> 'form-control input-sm']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            <p class="text-left">
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-space btn-success']) !!}
                                {!! Form::reset('Limpar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('produto/listar') }}">Voltar</a>
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
