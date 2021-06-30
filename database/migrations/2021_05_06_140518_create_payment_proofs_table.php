<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_proofs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('enrollment_id');
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');

            $table->unsignedDecimal('paid_price');
            $table->date('payment_date');

            $table->string('payment_receipt_path');
            $table->string('cnic_front_image_path');
            $table->string('cnic_back_image_path');

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
        Schema::dropIfExists('payment_proofs');
    }
}
