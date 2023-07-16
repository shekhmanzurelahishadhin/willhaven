<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarMotorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_motor_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('category_id');
            $table->string('sub_category_id')->nullable();
            $table->string('phone');
            $table->string('condition');
            $table->string('brand_id');
            $table->string('model_id');
            $table->string('edition')->nullable();
            $table->string('manufacture_year')->nullable();
            $table->string('kilomertes_run')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('feature_id')->nullable();
            $table->string('features_property')->nullable();
            $table->string('registration_year')->nullable();
            $table->string('transmission')->nullable();
            $table->text('description');
            $table->string('price');
            $table->string('district_id');
            $table->string('sub_district_id');
            $table->string('negotiable')->nullable();
            $table->string('term_condition');
            $table->text('video_url')->nullable();
            $table->string('delivery_charge')->nullable();
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
        Schema::dropIfExists('car_motor_products');
    }
}
