<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_requests', function (Blueprint $table) {
            $table->id();

            $table->string('request_type',30);

            $table->string('name',60);
            $table->string('email',60);
            $table->string('phone', 20);

            $table->string('request_for',30)->nullable()->default(NULL);

            $table->foreignId('trainer_id')->nullable()->default(NULL);
            $table->foreignId('training_id')->nullable()->default(NULL);
            $table->foreignId('batch_id')->nullable()->default(NULL);
            $table->foreignId('event_id')->nullable()->default(NULL);

            $table->timestamp('date')->nullable()->default(NULL);
            $table->string('reason')->nullable()->default(NULL);
            $table->string('no_of_classes')->nullable()->default(NULL);
            $table->decimal('fee')->nullable()->default(NULL);

            $table->string('attachment')->nullable()->default(NULL);

            $table->text('description')->nullable()->default(NULL);

            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('training_batches')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

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
        Schema::dropIfExists('support_requests');
    }
}
