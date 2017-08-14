
@foreach($cliente as $clientes)
        <center>
        <h2>RELATÓRIO BÁSICO DO CLIENTE</h2>
		</center>	
		<div class="fundo"><strong>{{ $clientes->nome }}</strong></div>
		<div class="fundo"><strong>CPF:</strong> {{ $clientes->cpf }}</div>
		<div class="fundo"><strong>RG:</strong> {{ $clientes->rg }}</div>
		<div class="fundo"><strong>Data de Nascimento:</strong> {{ $clientes->datanasc }}</div>
		<div class="fundo"><strong>Endereço:</strong> {{ $clientes->endereco }}, {{ $clientes->numero }}</div>
		<div class="fundo"><strong>Bairro:</strong> {{ $clientes->bairro }}</div>
		<div class="fundo"><strong>CEP:</strong> {{ $clientes->cep }}</div>
		<div class="fundo"><strong>Cidade:</strong> {{ $clientes->cidade }} - {{ $clientes->uf }}</div>
		<div class="fundo"><strong>Telefone:</strong> {{ $clientes->tel }}</div>
		<div class="fundo"><strong>Celular:</strong> {{ $clientes->cel }}</div>
		<div class="fundo"><strong>E-mail:</strong> {{ $clientes->email }}</div>
		<div class="fundo"><strong>Data do Cadastro:</strong> 
			<?php 
			$novo = explode(" ",$clientes->created_at);
			$hora = $novo[1];
			$data = date('d/m/Y',strtotime($clientes->created_at));
			echo $data . ' ás ' . $hora;
			?>
		</div>	
@endforeach

