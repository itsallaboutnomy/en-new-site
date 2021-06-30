<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_accounts', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_enabled')->default(false);

            $table->string('type',20)->default('cash');

            $table->string('bank_name',60)->nullable()->default(null);
            $table->string('account_title',60)->nullable()->default(null);
            $table->string('account_number',30)->nullable()->default(null);
            $table->string('iban',35)->nullable()->default(null);

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
        Schema::dropIfExists('payment_accounts');
    }
}
