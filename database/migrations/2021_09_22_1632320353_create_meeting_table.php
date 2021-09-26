<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingTable extends Migration
{
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_title')->nullable()->default('NULL');
            $table->string('meeting_code');
            $table->integer('user_id')->default('0');
            $table->text('remarks')->nullable()->default('NULL');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting');
    }
}
