<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('meeting_history', function (Blueprint $table) {

		$table->id();
		$table->string('meeting_code');
		$table->string('nick_name')->default('No-name');
		$table->integer('user_id')->default('0');
		$table->datetime('joined_at')->default('current_timestamp');
		$table->text('remarks')->nullable()->default('NULL');
        });
    }

    public function down()
    {
        Schema::dropIfExists('meeting_history');
    }
}