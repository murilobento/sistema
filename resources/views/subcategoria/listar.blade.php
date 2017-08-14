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
                   <div class="panel-heading panel-heading-divider">Listagem de Subcategoria<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-success" href="{{ url('subcategoria/adicionar') }}">Adicionar Subcategoria</a></span><span class="panel-subtitle">Clique na subcategoria para editar.</span></div>
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th style="width:40%;">Subcategoria</th>
                                    <th style="width:40%;">Categoria</th>                                    
                                    <th style="width:20%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategorias as $subcategoria)
                                <tr>
                                    <td><a href="{{ url('/subcategoria/'.$subcategoria->id.'/editar') }}">{{ $subcategoria->subcategoria }}</a></td>
                                    <td>{{ $subcategoria->categoria }}</td>
                                    <td class="actions">
                                        <a href="{{ url('/subcategoria/'.$subcategoria->id.'/editar') }}" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => 'subcategoria/'.$subcategoria->id, 'style' => 'display: inline;']) !!}
                                        <a type="button" class="icon" data-toggle="modal"  data-target="#modal-delete-{{ $subcategoria->id }}"><i class="mdi mdi-delete"></i></a>
                                        <div class="modal fade" id="modal-delete-{{ $subcategoria->id }}" tabIndex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            ×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="lead"><i class="fa fa-question-circle fa-lg"></i>  Deseja desativar o registro: <code> {{ $subcategoria->subcategoria }}</code></p>
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