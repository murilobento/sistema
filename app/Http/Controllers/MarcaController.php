<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Redirect;
use Session;
use DB;
use PDF;
use Validator;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class MarcaController extends Controller
{
   public function adicionar() {
        return view('marca.formulario');
    }

    public function listar() {
        $marcas = Marca::all();
        return view('marca.listar', ['marcas' => $marcas]);
    }

    public function salvar(Request $request) {
        $this->validate($request, [
            'marca' => 'required|max:255|unique:marcas',
        ]);
        $marca = new Marca();
        $marca->marca = Input::get('marca');
        $marca->save();
        Session::flash('mensagem_sucesso', 'Registro cadastrado com sucesso!');
        return Redirect::to('marca/listar');
    }

    public function editar($id) {
        $marca = Marca::findOrFail($id);
        return view('marca.formulario', ['marca' => $marca]);
    }

    public function atualizar($id, Request $request) {
        $this->validate($request, [
            'marca' => 'required|max:255|unique:marcas',
        ]);
        $marca = marca::findOrFail($id);
        // $marca->marca = Input::get('marca');
        $marca->update($request->all());
        Session::flash('mensagem_sucesso', 'Registro editado com sucesso!');
        return Redirect::to('marca/listar'); 
        
    }
    public function deletar($id) {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        Session::flash('mensagem_sucesso', 'Registro deletado com sucesso!');
        return Redirect::to('marca/listar');
    }   
}
