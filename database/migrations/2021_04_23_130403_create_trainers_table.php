<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);

            $table->boolean('is_enabled')->default(false);
            $table->string('admin_status',15)->default('Pending');

            $table->string('name');
            $table->string('slug');

            $table->string('designation',60)->default('Amazon Mentor');

            $table->boolean('is_mentorship_enabled')->default(false);
            $table->boolean('is_per_hour_enabled')->default(false);

            $table->float('mentorship_fee')->nullable()->default(NULL);
            $table->float('per_hour_fee')->nullable()->default(NULL);
            $table->char('mentorship_fee_currency',3);
            $table->char('per_hour_fee_currency',3);

            $table->string('profile_image_path')->nullable()->default(NULL);

            $table->longText('summary')->nullable()->default(NULL);

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
        Schema::dropIfExists('trainers');
    }
}
