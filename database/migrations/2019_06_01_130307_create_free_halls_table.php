<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateFreehallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_halls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Day');
            $table->string('PeriodID');
            $table->string('Building');
            $table->string('ClassID');
            $table->string('Access');
            $table->integer('Capacity');
            $table->string('DepartmentID');
            $table->datetime('Duration');
            $table->string('Note')->nullable();
            $table->SoftDeletes();
            $table->unique(['Day','PeriodID','ClassID'],'UniqueFree');
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
        Schema::dropIfExists('free_halls');
    }
}
