<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_approved')->default(false);

            $table->string('name',60);
            $table->string('email',60);
            $table->string('phone', 20);

            $table->foreignId('training_id')->nullable()->default(NULL);
            $table->foreignId('consent_terms_id')->nullable()->default(NULL);

            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
            $table->foreign('consent_terms_id')->references('id')->on('consent_terms')->onDelete('cascade');

            $table->string('consent_pdf_path')->nullable()->default(NULL);
            $table->string('signature_image_path')->nullable()->default(NULL);

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
        Schema::dropIfExists('consents');
    }
}
