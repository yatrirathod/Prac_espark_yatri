<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_technologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('techID')->unsigned()->nullable();
            $table->foreign('techID')->references('id')->on('technologies')->onDelete('set null');
            $table->bigInteger('empID')->unsigned()->nullable();
            $table->foreign('empID')->references('id')->on('employees')->onDelete('set null');
            $table->enum('level',['0','1','2']);
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
        Schema::dropIfExists('emp_technologies');
    }
}
