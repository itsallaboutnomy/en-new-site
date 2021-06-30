<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_enabled')->default(false);

            $table->string('blog_image');
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->timestamp('date')->nullable()->default(NULL);
            $table->string('category')->nullable()->default(NULL);
            $table->text('short_summary');
            $table->text('content')->nullable()->default(NULL);

            $table->foreignId('created_by');
            $table->foreignId('deleted_by')->nullable()->default(NULL);

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('blogs');
    }
}
