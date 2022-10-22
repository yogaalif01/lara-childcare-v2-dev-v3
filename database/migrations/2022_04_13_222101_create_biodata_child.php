<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_child', function (Blueprint $table) {
            $table->id('id_biodataChild');
            $table->unsignedBigInteger('id_biodataUser');
            $table->foreign('id_biodataUser')
                  ->references('id_biodataUser')
                  ->on('biodata_user')
                  ->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->date('brith_date');
            $table->string('brith_place');
            $table->string('gender');
            $table->string('address');
            $table->integer('phone_number');
            $table->string('other');
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
        Schema::dropIfExists('biodata_child');
    }
}
