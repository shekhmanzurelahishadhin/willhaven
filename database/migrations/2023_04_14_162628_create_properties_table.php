<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('purpose');
            $table->string('division');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('price');
            $table->string('area');
            $table->string('unit');
            $table->string('room');
            $table->string('bedroom');
            $table->string('washroom');
            $table->string('floor');
            $table->string('kitchen');
            $table->string('parking');
            $table->string('img');
            $table->string('video_link');
            $table->string('amenities');
            $table->string('locations');
            $table->string('distance');
            $table->string('google_map_embed_code')->nullable();
            $table->string('descriptions');
            $table->string('featured');
            $table->string('top_property');
            $table->string('urgent_property');
            $table->string('addedBy');
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
        Schema::dropIfExists('properties');
    }
}
