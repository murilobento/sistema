<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use Redirect;
Use App\Subcategoria;
Use App\Categoria;
use Session;

class SubcategoriaController extends Controller
{
    public function adicionar() {
        $categorias = Categoria::orderBy('categoria')->get();
    	return view('subcategoria.formulario', ['categorias' => $categorias]);
    }
    public function salvar(Request $request){
        $this->validate($request, [
            'subcategoria' => 'required|max:255|unique:subcategorias',
            //'categoria' => 'required',
        ]);
    	$subcategorias = new Subcategoria();
        $subcategorias = $subcategorias->create($request->all());
        Session::flash('mensagem_sucesso', 'Registro cadastrado com sucesso!');
        return Redirect::to('subcategoria/listar');
    }

    public function listar(){
    	$subcategorias = DB::table('subcategorias')
            ->join('categorias', 'subcategorias.cat_id', '=', 'categorias.id')
            ->select('subcategorias.*', 'categorias.categoria')
            ->orderBy('subcategoria', 'asc')
            ->get();
    	return view('subcategoria.listar',  ['subcategorias' => $subcategorias]);
    }
    public function editar($id){
        $subcategoria = Subcategoria::findOrFail($id);
        $categorias = Categoria::orderBy('categoria')->get();
        return view('subcategoria.formulario', ['subcategoria' => $subcategoria], ['categorias' => $categorias]);
    }
    public function atualizar($id, Request $request){
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->update($request->all());
        Session::flash('mensagem_sucesso', 'Registro editado com sucesso!');
        return Redirect::to('subcategoria/listar');
    }
    public function deletar($id){
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->delete();
        Session::flash('mensagem_sucesso', 'Registro deletado com sucesso!');
        return Redirect::to('subcategoria/listar');

    }
}
