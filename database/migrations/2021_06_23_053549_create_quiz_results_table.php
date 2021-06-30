<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->default(Null);

            $table->string("attempt_id")->nullable();
            $table->foreignId("quiz_enrollment_id")->nullable();
            $table->foreignId('student_id');

            $table->integer('obtained_marks')->nullable()->default(0);
            $table->boolean('is_passed')->default(0);

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('quiz_enrollment_id')->references('id')->on('quiz_certification_enrollments')->onDelete('cascade');
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
        Schema::dropIfExists('quiz_results');
    }
}
