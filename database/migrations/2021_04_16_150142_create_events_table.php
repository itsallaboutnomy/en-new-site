<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);
            $table->string('type');

            $table->boolean('is_enabled')->default(false);
            $table->string('admin_status',15)->default('Pending');

            $table->timestamp('starting_at')->nullable()->default(NULL);

            $table->string('key',3);
            $table->string('title');
            $table->string('slug');
            $table->string('topic')->nullable()->default(NULL);

            $table->string('location');
            $table->string('venue')->nullable()->default(NULL);

            $table->float('charging_fee')->nullable()->default(NULL);
            $table->char('currency',3)->nullable()->default(NULL);

            $table->string('host_name')->nullable()->default(NULL);
            $table->string('host_designation')->nullable()->default(NULL);

            $table->foreignId('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->default(NULL);
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

            $table->string('short_summary')->nullable()->default(NULL);


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
        Schema::dropIfExists('events');
    }
}
