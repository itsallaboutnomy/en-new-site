<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('type',60);
            $table->boolean('is_enabled')->default(false);

            $table->string('name',100);
            $table->string('father_name',100)->nullable()->default(NULL);
            $table->string('email',100);

            $table->string('cnic',20)->nullable()->default(NULL);
            $table->string('phone',20)->nullable()->default(NULL);

            $table->string('country',100)->nullable()->default(NULL);
            $table->string('city',100)->nullable()->default(NULL);

            $table->string('password_str')->nullable()->default(NULL);

            $table->string('profile_image_path')->nullable()->default(NULL);
            $table->string('income_proof_image_path')->nullable()->default(NULL);
            $table->string('utility_bill_image_path')->nullable()->default(NULL);
            $table->string('cnic_back_image_path')->nullable()->default(NULL);
            $table->string('cnic_front_image_path')->nullable()->default(NULL);

            $table->string('facebook_profile_link')->nullable()->default(NULL);

            $table->string('password')->nullable()->default(NULL);
            $table->timestamp('email_verified_at')->nullable()->default(NULL);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('deleted_by')->after('email_verified_at')->nullable()->default(NULL);
            $table->foreignId('created_by')->after('email_verified_at')->nullable()->default(NULL);

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
