<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_assistants', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_enabled')->default(false);

            $table->string('name');
            $table->string('slug');

            $table->string('experience_level');

            $table->string('facebook_link')->nullable()->default(null);
            $table->string('linkedin_link')->nullable()->default(null);

            $table->string('img_path')->nullable()->default(NULL);

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
        Schema::dropIfExists('virtual_assistants');
    }
}
