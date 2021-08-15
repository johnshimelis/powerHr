<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisorderTherapistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disorder_therapist', function (Blueprint $table) {
            $table->unsignedBigInteger('disorder_id');
            $table->unsignedBigInteger('therapist_id');
            $table->foreign('disorder_id')->references('id')->on('disorder');
            $table->foreign('therapist_id')->references('id')->on('therapist');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disorder_therapist');
    }
}
