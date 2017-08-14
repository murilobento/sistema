<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('nome', 60);
            $table->text('descricao');
            $table->integer('marca_id')->unsigned();     
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->integer('cat_id')->unsigned();     
            $table->foreign('cat_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->integer('scat_id')->unsigned();     
            $table->foreign('scat_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->float('valorpago');
            $table->float('margem');
            $table->float('valorvenda');
            $table->integer('estoque');
            $table->string('foto', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
