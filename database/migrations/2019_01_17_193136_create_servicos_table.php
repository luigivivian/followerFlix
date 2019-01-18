<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataContrato')->default(date("Y-m-d H:i:s"));
            $table->string('descricao')->default('Contrato Obrigatorio');
            $table->string('tipoServico')->default('basico'); //basico, pro ou super
            $table->boolean('contrato')->nullable();
            $table->boolean('prestacao')->nullable();
            $table->string('status')->default('pendente');
            $table->date('dataPagamento')->nullable();
            $table->integer('id_prestante')->unsigned();
            $table->foreign('id_prestante')->references('id')->on('usuarios');
            $table->integer('id_contratante')->unsigned();
            $table->foreign('id_contratante')->references('id')->on('usuarios');
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
        Schema::dropIfExists('servicos');
    }
}
