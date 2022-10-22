<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_child', function (Blueprint $table) {
            $table->id('id_childActivity');
            $table->unsignedBigInteger('id_biodataChild');
            $table->foreign('id_biodataChild')
                  ->references('id_biodataChild')
                  ->on('biodata_child')
                  ->onDelete('cascade');

            $table->string('condition', 100);
            $table->string('health', 100);
            $table->text('note', 200);
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
        Schema::dropIfExists('detail_child');
    }
}
