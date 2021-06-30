<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizCertificationEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_certification_enrollments', function (Blueprint $table) {
            $table->id();

            $table->string('unique_code')->nullable();

            $table->foreignId('course_id');
            $table->foreignId('student_user_id');

            $table->string( 'secret_token')->nullable()->default(NULL);
            $table->timestamp( 'token_expired_at')->nullable()->default(NULL);
            $table->timestamp( 'attempted_at')->nullable()->default(NULL);
            $table->timestamp( 'exam_prepared_at')->nullable()->default(NULL);

            $table->integer('total_exam_time')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('challan_url')->nullable();

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
        Schema::dropIfExists('quiz_certification_enrollments');
    }
}
