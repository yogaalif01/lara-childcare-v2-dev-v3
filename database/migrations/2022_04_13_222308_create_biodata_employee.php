<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_employee', function (Blueprint $table) {
            $table->id('id_biodataEmployee');
            
            $table->unsignedBigInteger('id_account');
            $table->foreign('id_account')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('full_name', 45);
            $table->string('gender', 45);
            $table->date('join_date');
            $table->date('brith_date');
            $table->string('brith_place', 45);
            $table->string('address', 45);
            $table->integer('phone_number');
            $table->string('status', 45);
            $table->string('religion', 45);
            $table->string('last_education', 45);
            $table->string('institution', 45);
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
        Schema::dropIfExists('biodata_employee');
    }
}
