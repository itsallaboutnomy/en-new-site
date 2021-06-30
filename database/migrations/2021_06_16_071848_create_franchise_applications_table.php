<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_applications', function (Blueprint $table) {
            $table->id();
            $table->string('admin_status')->default('pending');

            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('father_name',100)->nullable()->default(NULL);
            $table->string('address',190)->nullable()->default(NULL);
            $table->string('shareholder',30)->nullable()->default(NULL);

            $table->string('phone',20)->nullable()->default(NULL);
            $table->string('email',100);
            $table->string('cnic',20)->nullable()->default(NULL);
            $table->string('city',100)->nullable()->default(NULL);
            $table->string('country',100)->nullable()->default(NULL);
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
        Schema::dropIfExists('franchise_applications');
    }
}
