<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
  
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DepartmentID');
            $table->string('DepartmentName');
            $table->string('FacultyID');
            $table->string('FacultyName');
            $table->timestamps();
            $table->unique(['DepartmentID','FacultyID'],'Unique');
            // Makes the departmentID and Faculty ID unique KEys
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
