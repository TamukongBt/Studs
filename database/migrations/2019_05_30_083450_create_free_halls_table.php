<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creating the tables required to store the data
        // and adding the softdelete to maintain deleted records
        Schema::create('free_halls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Day');
            $table->string('PeriodID');
            $table->string('Building');
            $table->integer('Capacity');
            $table->string('ClassID');
            $table->string('Access');
            $table->softDeletes();
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
