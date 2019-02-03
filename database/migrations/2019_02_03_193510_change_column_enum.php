<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;

class ChangeColumnEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->enum('status', [Enuns::servico_status_default, Enuns::servico_status_aprovado, Enuns::servico_status_finalizado])->default(Enuns::servico_status_default);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
}
