<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualAssistantRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_assistant_requests', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_enabled')->default(false);

            $table->string('name');
            $table->string('slug');

            $table->string('email')->unique();

            $table->string('city');
            $table->string('contact_number');

            $table->string('va_experience');
            $table->string('speciality');
            $table->string('product_hunting');
            $table->string('listing_creation');
            $table->string('bulk_listing');
            $table->string('ppc');
            $table->string('listing_copy_writing');
            $table->string('keyword_research');
            $table->string('fba_shipment_creation');
            $table->string('product_launch');
            $table->string('images_designing');
            $table->string('a_plus_content_manager');
            $table->string('promotions_creation');
            $table->string('fbm_orders_management');
            $table->string('availability');

            $table->text('short_summary')->nullable();
            $table->text('comments')->nullable()->default(null);

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
        Schema::dropIfExists('virtual_assistant_requests');
    }
}
