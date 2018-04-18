<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roi_period');
            $table->integer('lc_roi_value');
            $table->integer('eth_roi_value');
            $table->integer('etn_roi_value');
            $table->integer('referal_bonus_value');
            $table->integer('recommitment_value');
            $table->integer('insurance_value');
            $table->integer('premier_lc_roi_value');
            $table->integer('assoc_premier_lc_roi_value');
            $table->integer('min_ph_value');
            $table->integer('max_ph_value');
            $table->integer('ph_mutiple_value');
            $table->integer('no_ph_pertime');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
