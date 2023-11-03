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
        Schema::create('pre_enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('session_id');
            $table->unique(['student_id', 'course_id', 'session_id']);
            $table->string('type');
            $table->string('status');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pre_enrollments');
    }
};