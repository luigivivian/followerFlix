<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;

class ChangeColumnativacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ativacao', function (Blueprint $table) {
            $table->enum('status', [Enuns::ativacao_inativo, Enuns::ativacao_ativo, Enuns::ativacao_invalida])->default(Enuns::ativacao_inativo);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ativacao', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
}
