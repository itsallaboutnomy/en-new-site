<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('key');

            $table->integer('total_marks')->nullable()->default(NULL);;
            $table->integer('passing_marks_percentage')->nullable()->default(NULL);

            $table->enum('status', ['active', 'expired'])->default('active');

            $table->float('price_dollar');
            $table->float('price_pkr');
            $table->integer('total_questions');

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
        Schema::dropIfExists('courses');
    }
}
