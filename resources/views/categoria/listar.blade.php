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
                   <div class="panel-heading panel-heading-divider">Listagem de Categorias<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-success" href="{{ url('categoria/adicionar') }}">Adicionar Categoria</a></span><span class="panel-subtitle">Clique na categoria para editar.</span></div>
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th style="width:75%;">Categoria</th>
                                    <th style="width:25%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $categoria)
                                <tr>
                                    <td><a href="{{ url('/categoria/'.$categoria->id.'/editar') }}">{{ $categoria->categoria }}</a></td>
                                    <td class="actions">
                                        <a href="{{ url('/categoria/'.$categoria->id.'/editar') }}" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => 'categoria/'.$categoria->id, 'style' => 'display: inline;']) !!}
                                        <a type="button" class="icon" data-toggle="modal"  data-target="#modal-delete-{{ $categoria->id }}"><i class="mdi mdi-delete"></i></a>
                                        <div class="modal fade" id="modal-delete-{{ $categoria->id }}" tabIndex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            ×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="lead"><i class="fa fa-question-circle fa-lg"></i>  Deseja desativar o registro: <code> {{ $categoria->categoria }}</code></p>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-danger btn-sm">Sim</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                       
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>          
    </div>
</div> 
@endsection