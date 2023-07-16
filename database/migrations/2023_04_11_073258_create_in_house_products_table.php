<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInHouseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_house_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('sub_sub_category_id')->nullable();
            $table->string('phone');
            $table->string('condition')->nullable();
            $table->string('authenticity')->nullable();
            $table->string('brand_id');
            $table->string('model_id');
            $table->string('edition')->nullable();
            $table->string('feature_id')->nullable();
            $table->string('features_property')->nullable();
            $table->text('description');
            $table->string('price');
            $table->string('district_id');
            $table->string('sub_district_id');
            $table->string('negotiable')->nullable();

            $table->string('term_condition');
            $table->text('video_url')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('delivery_option')->nullable();
            $table->text('images');
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
        Schema::dropIfExists('in_house_products');
    }
}
