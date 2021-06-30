<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);
            $table->string('title',60);
            $table->string('sub_title',60);

            $table->boolean('is_enabled')->default(false);
            $table->string('admin_status',15)->default('Pending');

            $table->string('logo_path');

            $table->text('summary')->nullable()->default(null);

            $table->foreignId('created_by');
            $table->foreignId('deleted_by')->nullable()->default(null);

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
        Schema::dropIfExists('milestones');
    }
}
