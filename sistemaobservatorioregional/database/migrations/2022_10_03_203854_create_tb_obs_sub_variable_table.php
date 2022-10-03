<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsSubVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_sub_variable', function (Blueprint $table) {
            $table->integer('sub_variable_id')->primary();
            $table->integer('sub_variable_variable_id');
            $table->string('sub_variable_name', 50)->default('Sub Variable no definida');
            
            $table->foreign('sub_variable_variable_id', 'fk_sub_variable_variable_id')->references('variable_id')->on('tb_obs_variable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_sub_variable');
    }
}
