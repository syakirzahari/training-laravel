<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_timetables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('day_id')->nullable();
            $table->unsignedInteger('subject_id')->nullable();
            $table->unsignedInteger('hall_id')->nullable();
            $table->timestamp('time_from')->nullable();
            $table->timestamp('time_to')->nullable();
            $table->timestamps();
        });

        Schema::table('student_timetables', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('hall_id')->references('id')->on('halls');
            $table->foreign('day_id')->references('id')->on('ref_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_timetables');
    }
}
