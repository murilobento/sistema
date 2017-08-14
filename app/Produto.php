<?php

namespace App;
use App\Marca;
use App\Categoria;
use App\Subcategoria;

Use DB;



use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
	'id',
	'nome',
	'descricao',
	'marca_id',
	'cat_id',
	'scat_id',
	'valorpago',
	'margem',
	'valorvenda',
	'estoque',
	'foto',
	];	

	public static function marcas(){
    	return Marca::all();
    }
    public static function categorias(){
    	return Categoria::all();
    }
    public static function subcategorias(){
    	return Subcategoria::all();
    }
    public static function categorias2(){
    	return Categoria::pluck('categoria','id');  
    }
    public static function listarProdutos(){
    	return DB::table('produtos')
            ->join('marcas', 'produtos.marca_id', '=', 'marcas.id')        
            ->join('categorias', 'produtos.cat_id', '=', 'categorias.id')
            ->join('subcategorias', 'produtos.scat_id', '=', 'subcategorias.id')
            ->select('produtos.*', 'marcas.marca', 'subcategorias.subcategoria', 'categorias.categoria')
            ->orderBy('nome', 'asc')
            ->get();
    }
}
