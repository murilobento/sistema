@extends('layouts.app') 

@section('content')
 

<div class="be-content">
                <div class="main-content container-fluid">
                    <!--Basic forms-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="user-display">
                                <div class="user-display-bg"><img src="{{asset('img/bg.png')}}" alt="Profile Background"></div>
                                <div class="user-display-bottom">
                                    <div class="user-display-avatar"><img src="{{asset('img/avatar.png')}}" alt="Avatar"></div>
                                    <div class="user-display-info">
                                        
                                        <div class="name">{{ $cliente->nome }} <a href="{{ url('/cliente/'.$cliente->id.'/editar') }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="icon mdi mdi-edit"></i></a> <a href="{{ url('/cliente/'.$cliente->id.'/imprimir') }}" target="_blank" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="icon mdi mdi-print"></i></a></div>
                                        <div class="nick"><span class="mdi mdi-calender"></span>Data do Cadastro: {{ $cliente->created_at->format('d/m/Y H:i:s') }} </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="user-info-list panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-heading panel-heading-divider">Consulta de Cliente</div>
                                <div class="panel-body">
                                    <table class="no-border no-strip skills">
                                        <tbody class="no-border-x no-border-y">
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-card"></span></td>
                                                <td class="item">CPF e RG<span class="icon s7-portfolio"></span></td>
                                                <td>{{ $cliente->cpf }} - {{ $cliente->rg }}</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-cake"></span></td>
                                                <td class="item">Data de Nascimento<span class="icon s7-gift"></span></td>
                                                <td>{{ $cliente->datanasc }}</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-phone-end"></span></td>
                                                <td class="item">Telefone<span class="icon s7-phone"></span></td>
                                                <td>{{ $cliente->tel }}</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                                <td class="item">Celular<span class="icon s7-phone"></span></td>
                                                <td>{{ $cliente->cel }}</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                                                <td class="item">Endereço<span class="icon s7-map-marker"></span></td>
                                                <td>{{ $cliente->endereco }} n° {{ $cliente->numero }}, {{ $cliente->bairro }}, {{ $cliente->cep }}, {{ $cliente->cidade }} - {{ $cliente->uf }}</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-email"></span></td>
                                                <td class="item">E-mail<span class="icon s7-global"></span></td>
                                                <td>{{ $cliente->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!--Basic Elements-->
                    </div>
                    <div class="row">
                        <!-- Responsive Table -->
                        <div class="col-lg-12">
                            <div class="user-info-list panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-heading panel-heading-divider">Últimas vendas</div>
                                <div class="panel-body">
                                    <table class="table table-striped table-borderless ">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:5%">Código</th>
                                                <th class="text-center" style="width:25%">Vendedor</th>                          
                                                <th class="text-center" style="width:15%">Data</th>
                                                <th class="text-center" style="width:15%">Valor (R$)</th>
                                                <th class="text-center" style="width:20%">Status</th>
                                                <th class="actions" style="width:20%">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">31</td>
                                                <td class="text-center">Carlos</td>
                                                <td class="text-center">10/03/2016</td>
                                                <td class="text-center">152,96</td>                        
                                                <td class="text-center"><span class="label label-default">Em aberto</span></td>
                                                <td class="actions"><a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>  <a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Excluir"><i class="mdi mdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">356</td>
                                                <td class="text-center">Ronaldo</td>
                                                <td class="text-center">10/03/2016</td>
                                                <td class="text-center">2365,75</td>
                                                <td class="text-center"><span class="label label-success">Pago</span></td>
                                                <td class="actions"><a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>  <a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Excluir"><i class="mdi mdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7823</td>
                                                <td class="text-center">André</td>
                                                <td class="text-center">10/03/2016</td>
                                                <td class="text-center">957,41</td>
                                                <td class="text-center"><span class="label label-danger">Em atraso</span></td>
                                                <td class="actions"><a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>  <a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Excluir"><i class="mdi mdi-delete"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">21333</td>
                                                <td class="text-center">Carlos</td>
                                                <td class="text-center">10/03/2016</td>
                                                <td class="text-center">1002,55</td>
                                                <td class="text-center"><span class="label label-success">Pago</span></td>
                                                <td class="actions"><a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Editar"><i class="mdi mdi-edit"></i></a>  <a href="#" class="icon" data-toggle="tooltip" href="#" data-original-title="Excluir"><i class="mdi mdi-delete"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Responsive Table -->
                    </div>
                </div>
            </div>


@endsection