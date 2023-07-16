<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('type');
            $table->string('role')->nullable();
            $table->string('employer');
            $table->string('division');
            $table->text('map');
            $table->string('imglogo');
            $table->string('qualification');
            $table->string('result');
            $table->string('experience');
            $table->string('salary');
            $table->string('phone');
            $table->string('email');
            $table->date('deadline');
            $table->text('website')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('jobs');
    }
}
