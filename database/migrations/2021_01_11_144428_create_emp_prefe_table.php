<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpPrefeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_prefes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('department');
            $table->string('noticePeriod');
            $table->string('CTC');
            $table->string('ECTC');
            $table->bigInteger('empID')->unsigned()->nullable();
            $table->foreign('empID')->references('id')->on('employees')->onDelete('set null');
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
        Schema::dropIfExists('emp_prefes');
    }
}
