<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpLangaugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_langauges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('langID')->unsigned()->nullable();
            $table->foreign('langID')->references('id')->on('languages')->onDelete('set null');
            $table->string('level');
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
        Schema::dropIfExists('emp_langauges');
    }
}
