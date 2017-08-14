<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
	'id',
	'nome',
	'cpf',
	'rg',
	'datanasc',
	'endereco',
	'numero',
	'bairro',
	'cep',
	'cidade',
	'uf',
	'tel',
	'cel',
	'email',
	'status' //para ativar e desativar cliente, sem que exclua seus dados do banco de dados.
	];
}

