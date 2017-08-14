<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Redirect;
use Session;
use DB;
use PDF;
use Validator;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class CategoriaController extends Controller {

    public function adicionar() {
        return view('categoria.formulario');
    }

    public function listar() {
        $categorias = Categoria::all();
        return view('categoria.listar', ['categorias' => $categorias]);
    }

    public function salvar(Request $request) {
        $this->validate($request, [
            'categoria' => 'required|max:255|unique:categorias',
        ]);
        $categoria = new Categoria();
        $categoria->categoria = Input::get('categoria');
        $categoria->save();
        Session::flash('mensagem_sucesso', 'Registro cadastrado com sucesso!');
        return Redirect::to('categoria/listar');
    }

    public function editar($id) {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.formulario', ['categoria' => $categoria]);
    }

    public function atualizar($id, Request $request) {
        $this->validate($request, [
            'categoria' => 'required|max:255|unique:categorias',
        ]);
        $categoria = Categoria::findOrFail($id);
        // $categoria->categoria = Input::get('categoria');
        $categoria->update($request->all());
        Session::flash('mensagem_sucesso', 'Registro editado com sucesso!');
        return Redirect::to('categoria/listar'); 
        
    }
    public function deletar($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        Session::flash('mensagem_sucesso', 'Registro deletado com sucesso!');
        return Redirect::to('categoria/listar');
    }   
}
