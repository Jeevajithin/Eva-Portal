<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('emp_id')->unique();
            $table->string('emp_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('designation');
            $table->integer('team_lead');
            $table->integer('marketing_manager');
            $table->integer('reporting_person');
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
        Schema::dropIfExists('employee_details');
    }
};
