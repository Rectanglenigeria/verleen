<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMergeMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merge_mains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ph_user_id');
            $table->integer('gh_user_id');
            $table->integer('ph_id');
            $table->integer('gh_id');
            $table->integer('amount');
            $table->integer('has_uploaded_teller');
            $table->integer('teller');
            $table->integer('payment_hash');
            $table->integer('has_confirmed_payment');
            $table->integer('has_defaulted_payment');
            $table->integer('has_fake_pop');
            $table->integer('has_extended_time');
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
        Schema::dropIfExists('merge_mains');
    }
}
