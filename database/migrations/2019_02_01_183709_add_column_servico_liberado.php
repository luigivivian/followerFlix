<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;

class AddColumnServicoLiberado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function($table) {
            $table->enum('status_remessa', [Enuns::servico_lote_aprovado, Enuns::servico_lote_neutro])->default(Enuns::servico_lote_neutro);
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
