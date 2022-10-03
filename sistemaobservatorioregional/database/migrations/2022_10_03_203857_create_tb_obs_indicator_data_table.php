<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObsIndicatorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obs_indicator_data', function (Blueprint $table) {
            $table->integer('indicator_data_indicator_id');
            $table->integer('indicator_data_year_id')->nullable();
            $table->decimal('indicator_data_quantitative', 10, 0)->default(-1);
            $table->string('indicator_data_qualitative', 5000)->default('No hay dato disponible');
            $table->decimal('indicator_data_qualitative_total', 10, 0)->default(-1);
            
            $table->foreign('indicator_data_indicator_id', 'fk_indicator_data_indicator_id')->references('indicator_id')->on('tb_obs_indicator');
            $table->foreign('indicator_data_year_id', 'fk_indicator_data_year_id')->references('year_id')->on('tb_obs_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_obs_indicator_data');
    }
}
