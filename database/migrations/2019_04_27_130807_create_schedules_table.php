<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Day');
            $table->string('CourseCode');
            $table->string('CourseName');
            $table->string('OptionID');
            $table->string('PeriodID');
            $table->string('ClassroomID');
            $table->string('DepartmentID');
            $table->string('Lecturer');
            $table->string('Level');
            $table->unique(['Day','PeriodID','ClassroomID'],'classUnique');
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
        Schema::dropIfExists('schedules');
    }
}
