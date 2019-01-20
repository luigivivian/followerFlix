<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function($table) {
            $table->string('avatar_img');
            $table->string('idade');
            $table->string('interesse');
            $table->string('prestacao_servico'); // presta serviço de engajamento para facebook
            $table->string('contratacao_servico'); //contrata para engajarem no instagram por exemplo
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
