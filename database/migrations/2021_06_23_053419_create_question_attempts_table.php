<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('question_id');
            $table->foreignId('student_user_id');

            $table->string("attempt_id")->nullable();

            $table->boolean('is_attempt')->nullable()->default(0);
            $table->float('obtained_marks')->nullable()->default(0);
            $table->text('text_answer')->nullable();
            $table->char('chosen_option',1)->nullable();
            $table->boolean('is_examiner_checked')->default(0);

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('student_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('question_attempts');
    }
}
