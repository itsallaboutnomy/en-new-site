<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);

            $table->boolean('is_head_office')->default(false);
            $table->boolean('is_enabled')->default(false);
            $table->string('admin_status',15)->default('Pending');

            $table->string('title',60);

            $table->string('city',60);
            $table->string('timings',20)->nullable()->default(NULL);
            $table->string('working_days',20)->nullable()->default(NULL);
            $table->string('phone',20)->nullable()->default(NULL);
            $table->string('mobile',20)->nullable()->default(NULL);
            $table->string('fax',20)->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->string('map_link')->nullable()->default(NULL);

            $table->string('image_path')->nullable()->default(NULL);
            $table->text('short_summary')->nullable()->default(NULL);

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
        Schema::dropIfExists('offices');
    }
}
