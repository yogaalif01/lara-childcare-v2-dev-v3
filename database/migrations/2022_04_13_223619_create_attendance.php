<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('id_attendance');
            
            $table->unsignedBigInteger('id_biodataEmployee');
            $table->foreign('id_biodataEmployee')
                    ->references('id_biodataEmployee')
                    ->on('biodata_employee')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('code_fee');
            $table->foreign('code_fee')
                    ->references('code_fee')
                    ->on('payroll')
                    ->onDelete('cascade');
    
            $table->date('date');
            $table->time('time');
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
        Schema::dropIfExists('attendance');
    }
}
