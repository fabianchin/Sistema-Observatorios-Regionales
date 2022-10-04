<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsIndicatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_indicator', function (Blueprint $table) {
            $table->integer('indicator_id')->primary();
            $table->integer('indicator_sub_variable_id');
            $table->string('indicator_name', 50)->default('Indicador no definido');
            
            $table->foreign('indicator_sub_variable_id', 'fk_indicator_sub_variable_id')->references('sub_variable_id')->on('tb_obs_sub_variable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_indicator');
    }
}
