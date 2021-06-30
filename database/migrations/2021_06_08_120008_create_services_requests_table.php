<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_requests', function (Blueprint $table) {
            $table->id();

            $table->string('name', 60);
            $table->string('email', 60);
            $table->string('phone', 20);
            $table->string('cnic', 60);
            $table->string('service', 60);
            $table->string('employees', 60);
            $table->string('office_address', 60);
            $table->string('city', 60);
            $table->string('country', 60);
            $table->string('message', 200);

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
        Schema::dropIfExists('servicesrequests');
    }
}
