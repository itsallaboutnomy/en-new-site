<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualAssistantSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_assistant_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('virtual_assistant_id');
            $table->foreignId('skill_id');

            $table->foreign('virtual_assistant_id')->references('id')->on('virtual_assistants')->onDelete('cascade');

            $table->foreignId('created_by')->nullable()->default(NULL);
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
        Schema::dropIfExists('virtual_assistant_skills');
    }
}
