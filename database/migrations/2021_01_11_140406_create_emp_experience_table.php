<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('companyName');
            $table->string('designation');
            $table->date('from');
            $table->date('to');
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
        Schema::dropIfExists('emp_experiences');
    }
}
