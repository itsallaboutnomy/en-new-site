<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvsSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evs_series', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('order_number')->default(1);

            $table->foreignId('parent_id')->nullable()->default(null);

            $table->string('title',100);
            $table->string('slug',100);

            $table->boolean('is_enabled')->default(false);
            $table->string('admin_status',15)->default('Pending');

            $table->string('image_path')->nullable()->default(NULL);
            $table->text('short_summary')->nullable()->default(NULL);
            $table->text('content')->nullable()->default(NULL);

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
        Schema::dropIfExists('evs_series');
    }
}
