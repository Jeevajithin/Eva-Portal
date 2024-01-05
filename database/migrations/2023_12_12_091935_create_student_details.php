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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();         
            $table->string('admission_no')->unique()->nullable();
            $table->string('joining_date');
            $table->string('name');
            $table->string('course_id');
            $table->integer('total_fee');
            $table->integer('fee_paid');
            $table->string('contact_no');
            $table->string('email_id');
            $table->string('comments');
            $table->string('source_id');
            $table->string('certificate_status');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('student_details');
    }
};
