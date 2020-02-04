<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proposta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('TB_Proposta', function (Blueprint $table) {
            $table->increments('cd_Proposta');
            $table->unsignedInteger('cd_Cliente')->nullable(false);
            $table->string('ds_Endereco_Obra')->nullable(false);
            $table->unsignedDecimal('vl_Total', 6, 2);
            $table->unsignedDecimal('vl_Sinal', 6, 2);
            $table->unsignedInteger('qt_Parcelas')->nullable(false);
            $table->unsignedDecimal('vl_Parcelas', 6, 2)->nullable(false);
            $table->date('dt_Parcelas');
            $table->string('ds_Arquivo');
            $table->integer('ic_Aberto')->default(1);
            $table->date('dt_Inicio_Pagamento')->nullable(false);
            $table->datetime('dt_Registro');
            $table->datetime('dt_Modificacao');

            $table
                ->foreign('cd_Cliente')
                ->references('cd_Cliente')
                ->on('TB_Cliente')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_Proposta');
    }
}
