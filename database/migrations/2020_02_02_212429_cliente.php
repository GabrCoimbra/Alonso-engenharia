<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_Cliente', function (Blueprint $table) {
            $table->increments('cd_Cliente')->nullable(false);
            $table->string('nm_Fantasia');
            $table->string('ds_Razao_Social');
            $table->integer('cd_CNPJ')->nullable(false);
            $table->string('ds_Endereco');
            $table->string('ds_Email')->unique()->nullable(false);
            $table->integer('cd_Telefone');
            $table->string('nm_Responsavel')->nullable(false);
            $table->integer('cd_CPF')->nullable(false);
            $table->integer('cd_Celular');
            $table->dateTime('dt_Registro');
            $table->dateTime('dt_Atualizacao');
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
        Schema::drop('TB_Cliente');
    }
}
