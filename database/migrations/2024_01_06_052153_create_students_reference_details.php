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
        Schema::create('students_reference_details', function (Blueprint $table) {
            $table->id();
            $table->integer('studentid');
            $table->integer('employee_id');
            $table->string('type');
            $table->decimal('total_fee', 10, 2);
            $table->decimal('fee_paid', 10, 2);
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
        Schema::dropIfExists('students_reference_details');
    }
};
