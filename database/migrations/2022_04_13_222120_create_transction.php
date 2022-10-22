<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transction', function (Blueprint $table) {
            $table->id('id_transaction');
            $table->unsignedBigInteger('id_biodataChild');
            $table->foreign('id_biodataChild')
                  ->references('id_biodataChild')
                  ->on('biodata_child')
                  ->onDelete('cascade');

            $table->date('date');
            $table->integer('nominal');
            $table->text('link_transfer');
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
        Schema::dropIfExists('transction');
    }
}
