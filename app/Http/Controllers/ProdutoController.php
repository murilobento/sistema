<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Subcategoria;
use App\Produto;
use App\Marca;
use App\Http\Requests;
use Redirect;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Session;

class ProdutoController extends Controller
{
    public function adicionar() {
        $categorias = Produto::categorias2();
        $marcas = Marca::orderBy('marca', 'asc')->pluck('marca','id');     
        return view('produto.formulario',compact('categorias'), compact('marcas'));
    }
    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $sub = Subcategoria::subcategorias($id);
            return response()->json($sub);
        }
    }
    public function salvar(Request $request){
        $produto = new Produto();
        $produto->nome = Input::get('nome');
        $produto->descricao = Input::get('descricao');
        $produto->marca_id = Input::get('marca');        
        $produto->cat_id = Input::get('categoria');
        $produto->scat_id = Input::get('subcategoria');
        $produto->valorpago = Input::get('valorpago');
        $produto->margem = Input::get('margem');
        $produto->valorvenda = Input::get('valorvenda');
        $produto->estoque = Input::get('estoque');
        if(Input::file('foto'))
        { 
          $image = Input::file('foto');
          $filename  = time() . '.' . $image->getClientOriginalExtension();
          $path = public_path('fotos/produtos/' . $filename);
          Image::make($image->getRealPath())->widen(300)->save($path);
          $produto->foto = $filename;
        }
        $produto->save();
        Session::flash('mensagem_sucesso', 'Registro cadastrado com sucesso!');
        return Redirect::to('produto/listar');
    }
    public function editar($id){
        $produto = Produto::findOrFail($id); 
        $marcas = Produto::marcas();
        $categorias = Produto::categorias();
        $subcategorias = Produto::subcategorias();
        return view('produto.formulario', ['produto' => $produto, 'categorias' => $categorias, 'subcategorias' => $subcategorias, 'marcas' => $marcas]);
    }
    public function listar(){
        $produtos = Produto::listarProdutos();
        return view('produto.listar',  ['produtos' => $produtos]);
    }
    public function atualizar(){
        
    }
}
