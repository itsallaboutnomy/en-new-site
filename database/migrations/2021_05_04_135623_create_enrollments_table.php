<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->string('enroll_for',10)->default('training');
            $table->string('mode',15)->default('online');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('event_id')->nullable()->default(NULL);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->foreignId('trainer_id')->nullable()->default(NULL);
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');

            $table->foreignId('training_id')->nullable()->default(NULL);
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');

            $table->foreignId('training_batch_id')->nullable()->default(NULL);
            $table->foreign('training_batch_id')->references('id')->on('training_batches')->onDelete('cascade');

            $table->foreignId('training_city_id')->nullable()->default(NULL);
            $table->foreign('training_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('unique_code')->unique();
            $table->unsignedTinyInteger('counts')->nullable()->default(NULL);

            $table->string('payment_type')->default('cash');
            $table->string('transaction_type')->nullable()->default(NULL);
            $table->unsignedDecimal('payable_price')->nullable()->default(NULL);

            $table->foreignId('payment_account_id')->nullable()->default(NULL);
            $table->foreign('payment_account_id')->references('id')->on('payment_accounts')->onDelete('cascade');

            $table->boolean('is_paid')->default(false);
            $table->string('approve_status',10)->default('pending');

            $table->string('challan_url')->nullable()->default(NULL);
            $table->string('heard_from',60)->nullable()->default(NULL);
            $table->string('occupation')->nullable()->default(NULL);

            $table->text('comments')->nullable()->default(NULL);

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
        Schema::dropIfExists('enrollments');
    }
}
