<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizCertificationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_certification_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quiz_enrollment_id');
            $table->foreignId('payment_channel_id')->nullable();
            $table->decimal('payment')->nullable();
            $table->string('payment_currency')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('payment_receipt_path')->nullable();
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();

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
        Schema::dropIfExists('quiz_certification_payments');
    }
}
