<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('nome', 100);
            $table->string('cpf', 30);
            $table->string('rg', 30);
            $table->string('datanasc', 19)->nullable();
            $table->string('endereco', 255);
            $table->string('numero', 8);
            $table->string('bairro', 60);
            $table->string('cep', 10);
            $table->string('cidade', 60);
            $table->string('uf', 2);
            $table->string('tel', 15)->nullable();
            $table->string('cel', 15)->nullable();
            $table->string('email', 80)->nullable();
            $table->integer('status');
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


