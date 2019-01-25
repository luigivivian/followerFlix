<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Enuns;

class CreateTableDispute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispute', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data')->default(date("Y-m-d"));
            $table->string('descricao');
            $table->string('status')->default(Enuns::dispute_status_analise);
            $table->string('arquivo')->nullable();
            $table->integer('id_redflag')->unsigned();
            $table->foreign('id_redflag')->references('id')->on('red_flags');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispute');
    }
}
