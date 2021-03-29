<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigacaoSinteticoTable extends Migration
{
    public function up()
    {
        Schema::connection('tokudb')->create('ligacao_sintetico', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->integer('qtd');
            $table->string('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('tokudb')->dropIfExists('ligacao_sintetico');
    }
}
