<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;
class CreateRedFlagsTable extends Migration
{
    public function up()
    {
        Schema::create('red_flags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->date('data')->default(date("Y-m-d"));
            $table->string('arquivo')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->string('email_pessoal');
            $table->string('nome_pessoal');
            $table->string('email_reportado');
            $table->string('nome_reportado');
            $table->string('descrição');
            $table->string('status')->default(Enuns::redflag_status_analise);
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
        Schema::dropIfExists('red_flags');
    }
}
