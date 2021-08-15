<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->id();
            $table->string('cv_path');
            $table->string('alma_mater');
            $table->time('work_hour_begin');
            $table->time('work_hour_end');
            $table->foreignId('user_id');
            // $table->unsignedBigInteger('user_id');
            // $table->references('id')->on('users');
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
        Schema::dropIfExists('therapists');
    }
}
