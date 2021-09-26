<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonTable extends Migration
{
	public function up()
	{
		Schema::create('salon', function (Blueprint $table) {

			$table->id('salon_id');
			$table->integer('owner_id');
			$table->string('name');
			// $table->string('image');
			// $table->string('logo');

		
			$table->bigInteger('phone')->nullable();
			$table->string('sun', 150)->nullable()->default('NULL');
			$table->string('mon', 150)->nullable()->default('NULL');
			$table->string('tue', 150)->nullable()->default('NULL');
			$table->string('wed', 150)->nullable()->default('NULL');
			$table->string('thu', 150)->nullable()->default('NULL');
			$table->string('fri', 150)->nullable()->default('NULL');
			$table->string('sat', 150)->nullable()->default('NULL');
			$table->tinyInteger('status');
			// $table->string('latitude');
			// $table->string('longitude');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('salon');
	}
}
