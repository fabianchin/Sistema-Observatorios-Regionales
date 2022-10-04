<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_variable', function (Blueprint $table) {
            $table->integer('variable_id')->primary();
            $table->integer('variable_dimension_id');
            $table->string('variable_name', 50)->default('No definido');
            
            $table->foreign('variable_dimension_id', 'fk_variable_dimension_id')->references('dimension_id')->on('tb_obs_dimension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_variable');
    }
}
