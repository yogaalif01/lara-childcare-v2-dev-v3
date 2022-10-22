<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_user', function (Blueprint $table) {
            $table->id('id_biodataUser');
            $table->unsignedBigInteger('id_account');
            $table->foreign('id_account')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('brith_place');
            $table->string('gender');
            $table->string('address');
            $table->integer('phone_number');
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
        Schema::dropIfExists('biodata_user');
    }
}
