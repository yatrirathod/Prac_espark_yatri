<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToEmpEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emp_education', function (Blueprint $table) { 
            $table->bigInteger('empID')->unsigned()->after('percenatge')->nullable();
            $table->foreign('empID')->references('id')->on('employees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emp_education', function (Blueprint $table) {
            $table->dropColumn('empID');
        });
    }
}
