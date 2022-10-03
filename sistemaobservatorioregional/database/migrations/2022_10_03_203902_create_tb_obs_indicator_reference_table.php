<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsIndicatorReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_indicator_reference', function (Blueprint $table) {
            $table->integer('indicator_reference_indicator_id');
            $table->integer('indicator_reference_reference_id');
            
            $table->foreign('indicator_reference_indicator_id', 'fk_indicator_reference_indicator_id')->references('indicator_id')->on('tb_obs_indicator');
            $table->foreign('indicator_reference_reference_id', 'fk_indicator_reference_reference_id')->references('reference_id')->on('tb_obs_reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_indicator_reference');
    }
}
