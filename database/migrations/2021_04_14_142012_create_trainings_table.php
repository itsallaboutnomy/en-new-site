<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);

            $table->boolean('is_enabled')->default(false);
            $table->boolean('is_registration_open')->default(true);
            $table->string('admin_status',15)->default('Pending');

            $table->char('key',5);
            $table->string('title');
            $table->string('slug');

            $table->float('charging_fee')->nullable()->default(NULL);
            $table->char('currency',3);

            $table->timestamp('starting_at')->nullable()->default(NULL);
            $table->timestamp('ending_at')->nullable()->default(NULL);

            $table->string('short_summary')->nullable()->default(NULL);
            $table->longText('training_benefits')->nullable()->default(NULL);
            $table->longText('summary')->nullable()->default(NULL);
            $table->longText('key_features')->nullable()->default(NULL);
            $table->longText('module_breakdown')->nullable()->default(NULL);

            $table->foreignId('created_by');
            $table->foreignId('deleted_by')->nullable()->default(NULL);

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('trainings');
    }
}
