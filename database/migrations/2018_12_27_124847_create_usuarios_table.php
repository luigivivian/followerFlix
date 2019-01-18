<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('login');
            $table->string('email');
            $table->string('senha');
            $table->boolean('status')->default(false);
            $table->date('dataCadastro')->default(date("Y-m-d H:i:s"));
            $table->string('genero');
            $table->string('sobrenome');
            $table->date('dataAtivacao')->nullable();
            $table->date('dataNascimento');
            $table->date('dataFimAtivacao')->nullable();
            $table->integer('id_usuario_pai')->nullable();

            $table->rememberToken();
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
