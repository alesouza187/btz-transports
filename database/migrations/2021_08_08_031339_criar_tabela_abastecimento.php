<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAbastecimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('veiculo_id');
            $table->integer('motorista_id');
            $table->integer('tipo_combustivel_id');
            $table->timestamp('abastecimento');
            $table->decimal('quantidade');
            $table->decimal('valor_total', $precision = 6, $scale = 2);

            $table->foreign('veiculo_id')
                ->references('id')
                ->on('veiculo');
            $table->foreign('motorista_id')
                ->references('id')
                ->on('motorista');
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
        Schema::drop('abastecimento');
    }
}
