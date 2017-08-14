<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table = 'subcategorias';

    protected $fillable = ['subcategoria','cat_id'];

    public static function subcategorias($id){
    	return Subcategoria::where('cat_id','=',$id)->orderBy('subcategoria', 'asc')->get();
    }
}
