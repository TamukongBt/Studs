<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CourseCode');
            $table->string('CourseName');
            $table->string('OptionID');
            $table->string('CourseType');
            $table->string('Level');
            $table->string('LecturerName');
            $table->string('LecturerName2')->nullable();
            $table->string('DepartmentID');
            $table->timestamps();
            $table->unique(['CourseCode','CourseName'],'Unique-Course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
