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
                    {!! Form::model($cliente, ['method' => 'PATCH', 'url' => 'cliente/'.$cliente->id]) !!}
                    <div class="panel-heading panel-heading-divider">Edição de Cliente<span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">
                        <div class="form-group col-sm-4">
                            <label>CPF <i class="txt-red">*</i></label>
                            {!!Form::text('cpf', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o CPF', 'data-mask'=>'cpf'])!!}
                        </div>
                        <div class="form-group col-sm-4">
                            <label>RG <i class="txt-red">*</i></label>
                            {!!Form::text('rg', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o RG', 'data-mask'=>'rg'])!!}
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Data de Nascimento</label>
                            {!!Form::text('datanasc', null,['class' => 'form-control input-sm', 'placeholder'=>'DD/MM/AAAA', 'data-mask'=>'data'])!!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Nome <i class="txt-red">*</i></label>
                            {!!Form::text('nome', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o nome completo'])!!}
                        </div> 
                        <div class="form-group col-sm-2">
                            <label>CEP</label>
                            {!!Form::text('cep', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o CEP', 'data-mask'=>'cep', 'id' => 'cep', 'onblur'=>'pesquisacep(this.value);'])!!}
                        </div>                       
                        <div class="form-group col-sm-8">
                            <label>Endereço <i class="txt-red">*</i></label>
                            {!!Form::text('endereco', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o endereço', 'id' => 'rua'])!!}
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Número <i class="txt-red">*</i></label>
                            {!!Form::text('numero', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o número', 'maxlength' => '7'])!!}
                        </div>                    
                        <div class="form-group col-sm-5">
                            <label>Bairro <i class="txt-red">*</i></label>
                            {!!Form::text('bairro', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o bairro', 'id' => 'bairro'])!!}
                        </div>                        
                        <div class="form-group col-sm-5">
                            <label>Cidade <i class="txt-red">*</i></label>
                            {!!Form::text('cidade', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a cidade', 'id' => 'cidade'])!!}
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label mb-10 text-left">UF <i class="txt-red">*</i></label>
                            <select name="uf" id="uf" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1" id="uf">
                                <option value="AC" <?php if ($cliente->uf == "AC") {echo "selected";} ?>>Acre</option>
                                <option value="AL" <?php if ($cliente->uf == "AL") {echo "selected";} ?>>Alagoas</option>
                                <option value="AP" <?php if ($cliente->uf == "AP") {echo "selected";} ?>>Amapá</option>
                                <option value="AM" <?php if ($cliente->uf == "AM") {echo "selected";} ?>>Amazonas</option>
                                <option value="BA" <?php if ($cliente->uf == "BA") {echo "selected";} ?>>Bahia</option>
                                <option value="CE" <?php if ($cliente->uf == "CE") {echo "selected";} ?>>Ceará</option>
                                <option value="DF" <?php if ($cliente->uf == "DF") {echo "selected";} ?>>Distrito Federal</option>
                                <option value="ES" <?php if ($cliente->uf == "ES") {echo "selected";} ?>>Espírito Santo</option>
                                <option value="GO" <?php if ($cliente->uf == "GO") {echo "selected";} ?>>Goiás</option>
                                <option value="MA" <?php if ($cliente->uf == "MA") {echo "selected";} ?>>Maranhão</option>
                                <option value="MT" <?php if ($cliente->uf == "MT") {echo "selected";} ?>>Mato Grosso</option>
                                <option value="MS" <?php if ($cliente->uf == "MS") {echo "selected";} ?>>Mato Grosso do Sul</option>
                                <option value="MG" <?php if ($cliente->uf == "MG") {echo "selected";} ?>>Minas Gerais</option>
                                <option value="PA" <?php if ($cliente->uf == "PA") {echo "selected";} ?>>Pará</option>
                                <option value="PB" <?php if ($cliente->uf == "PB") {echo "selected";} ?>>Paraíba</option>
                                <option value="PR" <?php if ($cliente->uf == "PR") {echo "selected";} ?>>Paraná</option>
                                <option value="PE" <?php if ($cliente->uf == "PE") {echo "selected";} ?>>Pernambuco</option>
                                <option value="PI" <?php if ($cliente->uf == "PI") {echo "selected";} ?>>Piauí</option>
                                <option value="RJ" <?php if ($cliente->uf == "RJ") {echo "selected";} ?>>Rio de Janeiro</option>
                                <option value="RN" <?php if ($cliente->uf == "RN") {echo "selected";} ?>>Rio Grande do Norte</option>
                                <option value="RS" <?php if ($cliente->uf == "RS") {echo "selected";} ?>>Rio Grande do Sul</option>
                                <option value="RO" <?php if ($cliente->uf == "RO") {echo "selected";} ?>>Rondônia</option>
                                <option value="RR" <?php if ($cliente->uf == "RR") {echo "selected";} ?>>Roraima</option>
                                <option value="SC" <?php if ($cliente->uf == "SC") {echo "selected";} ?>>Santa Catarina</option>
                                <option value="SP" <?php if ($cliente->uf == "SP") {echo "selected";} ?>>São Paulo</option>
                                <option value="SE" <?php if ($cliente->uf == "SE") {echo "selected";} ?>>Sergipe</option>
                                <option value="TO" <?php if ($cliente->uf == "TO") {echo "selected";} ?>>Tocantins</option>														
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Telefone <i class="txt-red">*</i></label>
                            {!!Form::text('tel', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o telefone', 'data-mask'=>'tel'])!!}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Celular <i class="txt-red">*</i></label>                      
                            {!!Form::text('cel', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o celular', 'data-mask'=>'cel'])!!}
                        </div> 
                        <div class="form-group col-sm-12">
                            <label class="control-label mb-10 text-left" for="example-email">E-mail </label>
                            {!!Form::email('email', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o e-mail'])!!}
                        </div>
                        {{ Form::hidden('status', '1') }}
                        <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Editar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('cliente/listar') }}">Voltar</a>                                    
                            </p>
                        </div>
                        {!! Form::close() !!}
                    </div>                    
                    @else
                    <div class="panel-heading panel-heading-divider">Cadastros de Cliente<span class="panel-subtitle pull-right">  <a class="btn btn-space btn-default" href="{{ url('cliente/listar') }}">Ver Clientes Cadastrados</a></span><span class="panel-subtitle">Os campos com <i class="txt-red">*</i> são obrigatórios</span></div>
                    <div class="panel-body">                            
                        {!! Form::open(['url' => 'cliente/salvar']) !!} 
                        <div class="form-group col-sm-4">
                            <label>CPF <i class="txt-red">*</i></label>
                            {!!Form::text('cpf', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o CPF', 'data-mask'=>'cpf', 'autofocus'])!!}
                        </div>
                        <div class="form-group col-sm-4">
                            <label>RG <i class="txt-red">*</i></label>
                            {!!Form::text('rg', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o RG', 'data-mask'=>'rg'])!!}
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Data de Nascimento</label>
                            {!!Form::text('datanasc', null,['class' => 'form-control input-sm', 'placeholder'=>'DD/MM/AAAA', 'data-mask'=>'data'])!!}
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Nome <i class="txt-red">*</i></label>
                            {!!Form::text('nome', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o nome completo'])!!}
                        </div>
                        <div class="form-group col-sm-2">
                            <label>CEP</label>
                            {!!Form::text('cep', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o CEP', 'data-mask'=>'cep', 'id' => 'cep', 'onblur'=>'pesquisacep(this.value);'])!!}
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Endereço <i class="txt-red">*</i></label>
                            {!!Form::text('endereco', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o endereço', 'id' => 'rua'])!!}
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Número <i class="txt-red">*</i></label>
                            {!!Form::text('numero', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o número', 'maxlength' => '7'])!!}
                        </div>                    
                        <div class="form-group col-sm-5">
                            <label>Bairro <i class="txt-red">*</i></label>
                            {!!Form::text('bairro', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o bairro', 'id' => 'bairro'])!!}
                        </div>                        
                        <div class="form-group col-sm-5">
                            <label>Cidade <i class="txt-red">*</i></label>
                            {!!Form::text('cidade', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite a cidade', 'id' => 'cidade'])!!}
                        </div>

                        <div class="form-group col-sm-2">
                            <label class="control-label mb-10 text-left">UF <i class="txt-red">*</i></label>
                            <select name="uf" class="form-control input-sm" data-placeholder="Escolha um tipo" tabindex="1" id="uf">
                                <option>--UF--</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>														
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Telefone <i class="txt-red">*</i></label>
                            {!!Form::text('tel', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o telefone', 'data-mask'=>'tel'])!!}
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Celular <i class="txt-red">*</i></label>                      
                            {!!Form::text('cel', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o celular', 'data-mask'=>'cel'])!!}
                        </div> 
                        <div class="form-group col-sm-12">
                            <label class="control-label mb-10 text-left" for="example-email">E-mail </label>
                            {!!Form::email('email', null,['class' => 'form-control input-sm', 'placeholder'=>'Digite o e-mail'])!!}
                        </div>
                        {{ Form::hidden('status', '1') }}
                        <div class="form-group col-sm-12">
                            <p class="text-left">                                                              
                                {!! Form::submit('Cadastrar', ['class' => 'btn btn-space btn-success']) !!}
                                {!! Form::reset('Limpar', ['class' => 'btn btn-space btn-primary']) !!}
                                <a class="btn btn-space btn-danger" href="{{ url('cliente/listar') }}">Voltar</a> 
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