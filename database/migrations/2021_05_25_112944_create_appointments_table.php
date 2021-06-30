<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id');

            $table->date('appointment_date');
            $table->string('full_name', 60);
            $table->string('email', 60);
            $table->string('phone', 20);
            $table->string('purpose_visit');
            $table->char('appointment_time', 20);

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
