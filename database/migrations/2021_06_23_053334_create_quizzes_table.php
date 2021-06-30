<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->string('title');

            $table->integer('total_marks')->nullable()->default(NULL);
            $table->integer('passing_marks')->nullable()->default(NULL);
            $table->integer('total_questions')->nullable()->default(0);
            $table->integer('total_time')->nullable()->default(0);

            $table->boolean('is_active')->default(false);

            $table->text('summary')->nullable()->default(NUll);

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
        Schema::dropIfExists('quizzes');
    }
}
