<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {

		$table->id('id');
		$table->string('booking_id');
		$table->integer('salon_id');
		$table->integer('user_id');
		$table->integer('emp_id');
		// $table->text('service_id');
		// $table->integer('coupon_id')->nullable()->default('NULL');
		// $table->float('discount')->default('0');
		// $table->float('payment');
		$table->date('date');
		$table->string('start_time');
		$table->string('end_time');
		// $table->string('payment_type',20);
		// $table->text('payment_token')->nullable()->default('NULL');
		$table->tinyInteger('payment_status')->default('0');
		$table->string('booking_status');
		$table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('booking');
    }
}