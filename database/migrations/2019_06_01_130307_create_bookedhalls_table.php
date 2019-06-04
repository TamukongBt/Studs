<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateBookedhallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookedhalls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Username');
            $table->string('Day');
            $table->string('PeriodID');
            $table->string('Building');
            $table->integer('Capacity');
            $table->string('ClassID');
            $table->string('Access');
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
        Schema::dropIfExists('bookedhalls');
    }
}
