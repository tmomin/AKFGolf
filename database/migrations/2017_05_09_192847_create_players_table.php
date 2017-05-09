<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('dob');
            $table->char('gender');
            $table->string('employer');
            $table->integer('addressId');
            $table->string('email');
            $table->string('emergencyName');
            $table->string('emergencyPhone');
            $table->string('waiverSign');
            $table->dateTime('waiverTime');
            $table->integer('passbook');
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
        Schema::drop('players');
    }
}
