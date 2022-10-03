<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsIndicatorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_indicator_details', function (Blueprint $table) {
            $table->integer('indicator_details_indicator_id');
            $table->integer('indicator_details_variable_type_id');
            $table->integer('indicator_details_region_id');
            $table->string('indicator_details_detail', 5000)->default('No hay dato disponible');
            $table->integer('indicator_details_state')->default(0);
            
            $table->foreign('indicator_details_indicator_id', 'fk_indicator_details_indicator_id')->references('indicator_id')->on('tb_obs_indicator');
            $table->foreign('indicator_details_region_id', 'fk_indicator_details_region_id')->references('region_id')->on('tb_obs_region');
            $table->foreign('indicator_details_variable_type_id', 'fk_indicator_details_variable_type_id')->references('variable_type_id')->on('tb_obs_variable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_indicator_details');
    }
}
