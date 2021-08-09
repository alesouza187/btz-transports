<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_combustivel_id');
            $table->string('nome');
            $table->string('placa');
            $table->string('nome_fabricante');
            $table->year('ano_fabricacao');
            $table->integer('capacidade_tanque');
            $table->string('observavao')->nullable();

            $table->foreign('tipo_combustivel_id')
                ->references('id')
                ->on('tipo_combustivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('veiculo');
    }
}
