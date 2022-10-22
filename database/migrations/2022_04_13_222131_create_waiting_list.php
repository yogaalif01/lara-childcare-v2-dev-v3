<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_list', function (Blueprint $table) {
            $table->id('id_waitingList');
            $table->unsignedBigInteger('id_biodataChild');
            $table->foreign('id_biodataChild')
                  ->references('id_biodataChild')
                  ->on('biodata_child')
                  ->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('waiting_list');
    }
}
