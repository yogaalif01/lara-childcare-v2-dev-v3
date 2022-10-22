<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_activity', function (Blueprint $table) {
            $table->id('id_childActivity');
            $table->unsignedBigInteger('id_biodataChild');
            $table->foreign('id_biodataChild')
                  ->references('id_biodataChild')
                  ->on('biodata_child')
                  ->onDelete('cascade');

            $table->string('activity', 100);
            $table->text('detail_activity');
            $table->string('type_activity', 45);
            $table->date('date');
            $table->text('equipment');
            $table->string('status',45);
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
        Schema::dropIfExists('child_activity');
    }
}
