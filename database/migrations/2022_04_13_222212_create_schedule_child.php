<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_child', function (Blueprint $table) {
            $table->id('id_detailChild');
            $table->unsignedBigInteger('id_biodataChild');
            $table->foreign('id_biodataChild')
                  ->references('id_biodataChild')
                  ->on('biodata_child')
                  ->onDelete('cascade');
            $table->date('schedule');
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
        Schema::dropIfExists('schedule_child');
    }
}
