<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;
use Redirect;
use Session;
Use DB;
Use PDF;

class ClienteController extends Controller
{
	public function adicionar(){
        return view('cliente.formulario');
	}
    public function salvar(Request $request){
        $this->validate($request, [
            'nome' => 'required|min:10|max:100',
            'cpf' => 'required|max:14|unique:clientes',
            'rg' => 'required|max:12|unique:clientes',
            'cep' => 'required|max:9',
            'endereco' => 'required|max:255',
            'bairro' => 'required|max:60',
            'cidade' => 'required|max:60',
            'uf' => 'required|max:2',
            'numero' => 'required|max:7',
            'tel' => 'max:15',
            'cel' => 'max:15',
            'email' => 'email|max:80',
        ]);
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());
        Session::flash('mensagem_sucesso', 'Registro cadastrado com sucesso!');
        return Redirect::to('cliente/listar');
    }
    public function listar(){
        $clientes = Cliente::where('status', '=', 1)->get();
        return view('cliente.listar', ['clientes' => $clientes]);
    }
    public function editar($id){
        $cliente = Cliente::findOrFail($id);
        return view('cliente.formulario', ['cliente' => $cliente]);
    }
    public function atualizar($id, Request $request){      
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        Session::flash('mensagem_sucesso', 'Registro editado com sucesso!');
        return Redirect::to('cliente/listar');  
    }
    public function deletar($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->status = 0;
        $cliente->save();
        Session::flash('mensagem_sucesso', 'Registro desativado com sucesso!');
        return Redirect::to('cliente/listar');

    }
    public function info($id){
        $cliente = Cliente::findOrFail($id);
        return view('cliente.info', ['cliente' => $cliente]);
    }
    public function imprimir($id){
        $cliente = DB::table('clientes')->where('id', $id)->get();
        if(count($cliente) < 1){
            return view('cliente.relatorios.vazio');
        }
        else {
            $pdf = PDF::loadView('cliente.relatorios.cliente', ['cliente' => $cliente])->setPaper('a4', 'portrait');
            return $pdf->stream('cliente.pdf');
        }
    }
    
}
