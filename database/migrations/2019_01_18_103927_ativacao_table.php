<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;

class AtivacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ativacao', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataCompra')->nullable();
            $table->enum('status', [Enuns::ativacao_inativo, Enuns::ativacao_ativo, Enuns::ativacao_invalida])->default(Enuns::ativacao_inativo);
            $table->enum('pago', [Enuns::ativacao_pagamento_fim, Enuns::ativacao_pagamento_naoPago, Enuns::ativacao_pagamento_pago])->default(Enuns::ativacao_pagamento_naoPago);
            $table->date('dataValidade')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('transacao_key')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
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
